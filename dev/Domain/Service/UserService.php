<?php


namespace Dev\Domain\Service;


use Dev\Application\Utility\UserGender;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Model\User;
use Dev\Infrastructure\Model\UserNotification;
use Dev\Infrastructure\Repository\UserRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserService extends AbstractService
{


    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filter
     * @return
     */
    public function index(array $filter = [])
    {
        $users = $this->repository;
        if (isset($filter['type']))
            $users = $users->where('type', $filter['type']);
        return $users->get();
    }

    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['phone_verified_at'] = now();
        $data['email_verified_at'] = now();
        if (!(isset($data['image']) && $data['image'] != null)) {
            $data['image'] = null;
        }
//        dd($data);
        $user = $this->repository->create($data);
        $date = new \DateTime();
        $user->email = 'user' . $date->getTimestamp() . '@medical_egy.com';
        $user->save();
        return $user;
    }

    /**
     * @param array $loginData
     * @return ResponseFactory|Response
     */
    public function login(array $loginData)
    {
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid username or password'], 403);
        }
        return response(['user' => auth()->user()]);
    }

    /**
     * @param User $user
     * @param array $validated
     * @return bool
     */
    public function updateProfile(User $user, array $validated)
    {
        $this->repository = $user;
        if (isset($validated['image']) && $validated['image'] != null && isset($validated['image'])) {
            $this->repository->image = $validated['image'];
        }
        if (isset($validated['password']) && $validated['password'] != null) {
            $this->repository->password = bcrypt($validated['password']);
        }
        if (isset($validated['name']) && $validated['name'] != null) {
            $this->repository->name = $validated['name'];
        }
        if (isset($validated['gender']) && $validated['gender'] != null) {
            $this->repository->gender = $validated['gender'];
        }
        if (isset($validated['lang']) && $validated['lang'] != null) {
            $this->repository->lang = $validated['lang'];
        }
        if (isset($validated['birthdate']) && $validated['birthdate'] != null) {
            $this->repository->birthdate = $validated['birthdate'];
        }
//        disabled for now to update user phone number
//        if (isset($validated['phone']) && $validated['phone'] != null) {
//            $this->repository->phone=$validated['phone'];
//        }
        return $this->repository->save();
    }


    /**
     * @param array $data
     * @return array
     */
    public function verifyPhone(array $data): array
    {
        $user = $this->repository->where('phone', $data['phone'])->first();
        if ($user->phone_code == $data['code']) {
            $user->phone_verified_at = now();
            $user->save();
            return $this->prepare_response(false, null, 'Account activated successfully', null,
                JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
        }
        return $this->prepare_response(true, null, 'Invalid code', null,
            JsonResponse::HTTP_BAD_REQUEST, JsonResponse::HTTP_BAD_REQUEST);
    }

    /**
     * @param array $data
     * @return array|false
     */
    public function forgetPassword(array $data, $api_token = null)
    {
        $user = $this->repository->where('api_token', $api_token)->first();
        if ($user->phone != $data['phone']) {
            return false;
        }
        return $user->update(['password' => bcrypt($data['password'])]);
    }

    /**
     * @param User $user
     * @param array $validated
     * @return bool
     */
    public function updateToken(User $user, array $validated)
    {
        $this->repository = $user;
        return $this->repository->update($validated);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $deleteStatus = $this->repository->find($id)->delete();
        if ($deleteStatus) {
            UserNotification::where('user_id', $id)->update(['user_id', null]);
            //TODO here we should delete all related data or empty it from database
        }
        return $deleteStatus;
    }

    /**
     * @param $user
     * @param array $validated
     * @return mixed
     */
    public function changeUserNotificationStatus($user, array $validated)
    {
        return $user->update(['notification_status' => $validated['status']]);
    }

    public function updateUserIdentity($user, array $data)
    {
        if (isset($data['identity_image']) && $data['identity_image'] != null) {
            $user->identity_image = $data['identity_image'];
        }
        if (isset($data['identity_type']) && $data['identity_type'] != null) {
            $user->identity_type = $data['identity_type'];
        }
        if (isset($data['identity_number']) && $data['identity_number'] != null) {
            $user->identity_number = $data['identity_number'];
        }
        return $user->save();
    }

    public function getStatistics()
    {
        return [
            'total_users_count' => $this->repository->count(),
            'male_users_count' => $this->repository->where('gender', UserGender::MALE)->count(),
            'female_users_count' => $this->repository->where('gender', UserGender::FEMALE)->count(),
            'verified_users_count' => $this->repository->whereNotNull('identity_number')->whereNotNull('identity_image')->count(),
        ];
    }
}
