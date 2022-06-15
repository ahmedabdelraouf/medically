<?php

namespace Database\Factories;

use Dev\Infrastructure\Model\Notification;
use Dev\Infrastructure\Model\User;
use Dev\Infrastructure\Model\UserNotification;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserNotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserNotification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $notifications = Notification::pluck('id')->toArray();
        $usedIds = User::pluck('id')->toArray();
        $isRead = [0, 1];
        return [
            'notification_id' => $notifications[array_rand($notifications)],
            'user_id' => $usedIds[array_rand($usedIds)],
            'is_read' => $isRead[array_rand($isRead)],
        ];
    }
}
