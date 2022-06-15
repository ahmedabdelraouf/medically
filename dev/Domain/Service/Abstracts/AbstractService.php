<?php

namespace Dev\Domain\Service\Abstracts;

use App\Http\Traits\ResponseTraits;
use App\Libraries\PushNotification;
use Dev\Infrastructure\Model\Notification;
use Dev\Infrastructure\Model\User;
use Dev\Application\Utility\PushNotificationScreen;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\UserVehicleRepository;

/**
 * Class AbstractService
 * @package Dev\Domain\Service\Abstracts
 */
class AbstractService
{
    use ResponseTraits;

    /**
     * @var AbstractRepository
     */
    protected $repository;


    public $push;

    /**
     * AbstractService constructor.
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
        $this->push = new PushNotification();
    }

    /**
     * @return AbstractRepository
     */
    public function index()
    {
        return $this->repository->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
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
        return $this->repository->find($id)->delete();
    }


    /**
     * @param $user_id
     * @param $title
     * @param $message
     */
    public function sendNotification($user_id, $title, $message)
    {
        $notification = Notification::create(['title' => $title, 'message' => $message]);
        $tokens = User::where('id', $user_id)->first()->fcm_token;
        return $this->push->sendPushNotification('multi', [$tokens], $message,
            $title, null, $notification->id, PushNotificationScreen::DefaultScreen);
    }

    public function storeImage($destinationPath,$image){
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $path = $image->move($destinationPath, $profileImage);
        return $path->getPathName();
    }

}
