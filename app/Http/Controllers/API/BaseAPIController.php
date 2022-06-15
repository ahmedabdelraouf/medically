<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use Dev\Infrastructure\Model\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseAPIController extends Controller
{
    use ResponseTraits;

    public function getAuthUser(Request $request)
    {
        $uid = $request->header('api_token');
        if (isset($uid))
            return User::where('api_token', $request->header('api_token'))->first();
        return null;
    }

    public function getAuthUserID(Request $request)
    {
        $uid = $request->header('uid');
        if (isset($uid)) {
            $user = User::where('api_token', $uid)->first();
            return isset($user) ? $user->id : null;
        }
        return null;
    }

    public function getUserAccount(Request $request)
    {
        $uid = $request->header('uid');
        if (isset($uid))
            return User::where('api_token', $request->header('uid'))->first();
        return null;
    }

    /**
     * @param null $error_massage
     * @return JsonResponse
     */
    public function handelErrorResponse($error_massage = null, $errorCode = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return $this->prepareApiResponse(true, $error_massage,
            trans('general.something_went_wrong'), [], $errorCode,
            $errorCode, null);
    }


}
