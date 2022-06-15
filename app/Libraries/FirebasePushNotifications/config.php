<?php
/**
 * Created by PhpStorm.
 * User: Hassan Saeed
 * Date: 2/22/2018
 * Time: 4:14 PM
 */

namespace App\Libraries\FirebasePushNotifications;


class config
{
    public function __construct()
    {
//        $this->key = "AAAAPAkBqds:APA91bFd8bLAstAT4IjBhy05d_HIEfgrIJ5ZCMdxDeXQMpH8vO3I4JT_qyf_0Lzvya2Fu0vNep210V8RDwOS-cqS3xaq_65evBd-a2goaUYDZxOOcGFpdxXJEmMZdi-gWgtmILBG6yE_";
//        $this->senderID = "257849141723";
        $this->key = "AAAAPAkBqds:APA91bFd8bLAstAT4IjBhy05d_HIEfgrIJ5ZCMdxDeXQMpH8vO3I4JT_qyf_0Lzvya2Fu0vNep210V8RDwOS-cqS3xaq_65evBd-a2goaUYDZxOOcGFpdxXJEmMZdi-gWgtmILBG6yE_";
        $this->senderID = "257849141723";
    }

    public function getKey()
    {
        return $this->key;
    }

    public $key,$senderID;
    public function getSenderID()
    {
        return $this->key;
    }

}
