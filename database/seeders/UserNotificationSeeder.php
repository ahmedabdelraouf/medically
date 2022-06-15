<?php

namespace Database\Seeders;

use Dev\Infrastructure\Model\UserNotification;
use Illuminate\Database\Seeder;

class UserNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserNotification::query()->truncate();
        UserNotification::factory(50)->create();
    }
}
