<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UpdateNotificationStatus;
use App\Http\Requests\UserNotificationReadRequest;
use App\Http\Resources\UserNotificationResource;
use Dev\Domain\Service\UserService;
use Dev\Infrastructure\Model\UserNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserNotificationController extends BaseAPIController
{

    private $service;

    /**
     * UserNotificationController constructor.
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getUserNotifications(Request $request)
    {
        $user = $this->getAuthUser($request);
        return $this->prepare_response_json($this->prepare_response(false, null,
            trans('admin.data_retrieved_successfully'),
            ['notifications' => UserNotificationResource::collection($user->userNotifications()->orderBy('created_at', 'desc')->get())],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK));
    }

    /**
     * @param UserNotificationReadRequest $readRequest
     * @return mixed
     */
    public function markNotificationAsRead(UserNotificationReadRequest $readRequest)
    {
        $user = $this->getAuthUser($readRequest);
        $userNotification = UserNotification::where('id', $readRequest->id)->where('user_id', $user->id)->first();

        if (isset($userNotification)) {
            $userNotification->is_read = 1;
            $userNotification->save();
            return $this->prepare_response_json($this->prepare_response(false, null,
                trans('admin.notification_read_successfully'), ['Notification' => $userNotification],
                JsonResponse::HTTP_OK, JsonResponse::HTTP_OK));
        }
        return $this->handelErrorResponse(trans('general.something_went_wrong'), Response::HTTP_NOT_FOUND);
    }

    /**
     * @param UserNotificationReadRequest $readRequest
     * @return mixed
     */
    public function markAllNotificationAsRead(Request $readRequest)
    {
        $user = $this->getAuthUser($readRequest);
        UserNotification::where('user_id', $user->id)->update(['is_read' => 1]);
        return $this->prepare_response_json($this->prepare_response(false, null,
            trans('admin.notification_read_successfully'), [],
            JsonResponse::HTTP_OK, JsonResponse::HTTP_OK));
    }

    public function changeUserNotificationStatus(UpdateNotificationStatus $request)
    {
        try {
            $updateStatus = $this->service->changeUserNotificationStatus($this->getAuthUser($request), $request->all());
            if ($updateStatus)
                return $this->prepareApiResponse(false, null,
                    trans('general.user_notification_status_updated_successfully'),
                    null,
                    JsonResponse::HTTP_OK, JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->prepare_response_json(
                $this->prepare_response(true, null, trans('admin.something_wrong_happened'), null,
                    JsonResponse::HTTP_BAD_REQUEST, JsonResponse::HTTP_BAD_REQUEST));
        }
     }
}
