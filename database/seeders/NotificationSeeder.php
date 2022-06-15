<?php

namespace Database\Seeders;

use Dev\Infrastructure\Model\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::query()->truncate();
        Notification::factory(100)->create();
    }
}
