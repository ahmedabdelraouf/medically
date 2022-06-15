<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateFCMTokenRequest;
use App\Http\Resources\UserResource;
use Dev\Application\Utility\UserTypes;
use Dev\Domain\Service\UserService;
use Dev\Infrastructure\Model\User;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseAPIController
{
    private $userService, $destinationPath, $identitiesDestinationPath;

    /**
     * Create a new AuthController instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->destinationPath = 'public/uploads/users';
        $this->identitiesDestinationPath = 'public/uploads/users/identities';
    }


    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            $hasher = app('hash');
            if ($hasher->check($request->password, $user->password)) {
                $user->api_token = $this->generateRandomString(40);
                $user->fcm_token = $request->fcm_token;
                $user->save();
                Auth::login($user);
                return $this->prepareApiResponse(false, null,
                    trans('general.user_logged_in_successfully'),
                    new UserResource($user),
                    Response::HTTP_OK, Response::HTTP_OK);
            }
        }
        return $this->handelRegitserError(trans('general.invalid_credentials'));
    }


    /**
     * @param null $error_massage
     * @return JsonResponse
     */
    public function handelRegitserError($error_massage = null): JsonResponse
    {
        return $this->prepareApiResponse(true, $error_massage,
            trans('general.something_went_wrong'), '', Response::HTTP_FORBIDDEN,
            Response::HTTP_FORBIDDEN, Response::HTTP_FORBIDDEN);
    }

    /**
     * Register a User.
     *
     * @param RegisterRequest $request
     * @return array|JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->userService->register($request->all());
        return $this->prepareApiResponse(false, null,
            trans('general.user_account_created_successfully'), new UserResource($user),
            Response::HTTP_OK, Response::HTTP_OK);
    }

    public function generateRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Get the authenticated User.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userProfile(Request $request): JsonResponse
    {
        $user = $this->getAuthUser($request);
        if (isset($user))
            return $this->prepareApiResponse(false, null,
                trans('admin.data_retrieved_successfully'),
                new UserResource($user),
                Response::HTTP_OK, Response::HTTP_OK, null, null);
        return $this->handelRegitserError(trans('general.something_went_wrong_please_try_later'));
    }

    /**
     * @param EditUserRequest $editUserRequest
     * @return JsonResponse
     */
    public function editUserProfile(EditUserRequest $editUserRequest): JsonResponse
    {
//        try {
        $dataArray = $editUserRequest->validated();
        if ($editUserRequest->hasFile('image')) {
            unset($dataArray['image']);
            $dataArray['image'] = $this->uploadImage($editUserRequest->file('image'), $this->destinationPath);
            dd($dataArray, 'test');
        }
        $user = $this->getAuthUser($editUserRequest);
        if ($this->userService->updateProfile($user, $dataArray)) {
            return $this->prepareApiResponse(false, null,
                trans('admin.data_retrieved_successfully'), $this->getUserAccount($editUserRequest),
                Response::HTTP_OK, Response::HTTP_OK, null, null);
        }
//        } catch (\Exception $exception) {
//            return $this->prepareApiResponse(true, null, trans('admin.something_wrong_happened'), null,
//                Response::HTTP_BAD_REQUEST, Response::HTTP_BAD_REQUEST);
//        }
        return $this->prepareApiResponse(true, null, trans('admin.something_wrong_happened'), null,
            Response::HTTP_BAD_REQUEST, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param ForgetPasswordRequest $request
     * @return JsonResponse
     */
    public function forgetPassword(ForgetPasswordRequest $request): JsonResponse
    {
        try {
            $update = $this->userService->forgetPassword($request->validated(), $request->header('uid'));
            if ($update)
                return $this->prepareApiResponse(false, null, trans('general.password_updated_successfully'),
                    null, Response::HTTP_OK, Response::HTTP_OK);
        } catch (\Exception $exception) {
        }
        return $this->handelRegitserError(trans('general.password_updated_failed'));

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $user = $this->getAuthUser($request);
        if (isset($user)) {
            $user->api_token = '';
            if ($user->save()) {
                return $this->prepareApiResponse(false, null,
                    'User successfully logged out',
                    null, Response::HTTP_OK, Response::HTTP_OK);
            }
        }
        return $this->handelRegitserError(trans('general.something_went_wrong'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateIdentity(Request $request)
    {
        $user = $this->getUserAccount($request);
        $dataArray = $request->all();
        if ($request->hasFile('identity_image')) {
            unset($dataArray['identity_image']);
            $dataArray['identity_image'] = $this->uploadImage($request->file('identity_image'), $this->identitiesDestinationPath);
        }
        $isupdated = $this->userService->updateUserIdentity($user, $dataArray);
        if ($isupdated) {
            return $this->prepareApiResponse(false, null,
                trans('admin.data_updated_successfully'),
                ['user' => new UserResource($user)],
                Response::HTTP_OK, Response::HTTP_OK, null, null);
        }
        return $this->handelErrorResponse(null, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param Request $request
     * @return string
     * @throws AuthException
     * @throws FirebaseException
     */
    public function deleteUser(Request $request): string
    {
        try {
            $user = User::find((int)$request->user_id);
            $this->defaultAuth->deleteUser($user->api_token);
            if (isset($user)) {
                if ($user->delete())
                    return "User removed successfully from database and firebase too";
            }
        } catch (\Exception $exception) {

        }
        return "failed to delete user";
    }

    public function updateFcmToken(UpdateFCMTokenRequest $request)
    {
        $user = $this->getAuthUser($request);
        if (isset($user)) {
            $user->last_login_as = $request->last_login_as;
            $user->fcm_token = $request->fcm_token;
            $user->save();
            return $this->prepareApiResponse(false, null,
                trans('admin.data_updated_successfully'),
                new UserResource($user), Response::HTTP_OK, Response::HTTP_OK);
        }
        return $this->handelErrorResponse(null, Response::HTTP_BAD_REQUEST);
    }


    public function userTypes()
    {
        return $this->prepareApiResponse(false, null, trans('admin.data_created_successfully'),
            UserTypes::genderTypesArr(), 'success', 200, 0, '');
    }

}
