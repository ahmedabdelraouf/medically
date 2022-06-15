<?php

namespace App\Libraries;

use App\Libraries\FirebasePushNotifications\Firebase;
use App\Libraries\FirebasePushNotifications\Push;
use Dev\Infrastructure\Model\User;
use Dev\Infrastructure\Model\UserNotification;

class PushNotification
{

//    public $push;
//    public $firebase;
//
//    public function __construct(Push $push, Firebase $firebase)
//    {
//        $this->push = $push;
//        $this->firebase = $firebase;
//    }

    /**
     * @param $message -> message will be sent in notification body.
     * @param $titles -> users will receive notification
     * @param $current -> current user for prevent notification created for this user.
     * @param array $additional -> additional data will be send with notification
     * @param bool $single -> check for sending group or send single.
     *
     */

    public function sendPushNotification($push_type = null, $regIds = null,
                                         $message = null, $title = null,
                                         $dataId = null, $notification_id,$screen = "/")
    {

        //Type error: Too few arguments to function App\Libraries\PushNotification::__construct(), 0 passed in E:\Saned Projects\_Shaqrady\routes\api.php on line 22 and exactly 2 expected

        $push = new Push();

        $dataLoad = array();
        // optional payload
        $dataLoad['data'] = $message;
        $dataLoad['id'] = ($dataId) ? $dataId : null;
        $scr = [
            'screen' => $screen,
            'id' => $dataLoad['id'],
        ];
        $dataLoad['badge'] = 1;

        $push->setScreen($scr);
        $push->setTitle($title);
        $push->setBadge(1);
        $push_type = isset($push_type) ? $push_type : 'individual';
        $include_image = isset($_GET['include_image']) ? TRUE : FALSE;
        $push->setMessage($message);

        $firebase = new Firebase();
        if ($include_image) {
            $push->setImage('https://api.androidhive.info/images/minion.jpg');
        } else {
            $push->setImage('');
        }

        $push->setIsBackground(TRUE);
        $push->setData($dataLoad);
        $response = '';
        if ($push_type == 'multi') {
            $json = $push->getPushData();
            $push = $push->getPushNotification();
            $response = $firebase->sendMultiple($regIds, $json, $push);
            //store notification into database for user
            $users = User::whereIn('fcm_token', $regIds)->get();
            foreach ($users as $user) {
                UserNotification::create([
                    'user_id' => $user->id,
                    'notification_id' => $notification_id,
                    'is_read' => 0,
                ]);
            }
        }
        return $response;
    }


}
