<?php

namespace Database\Seeders;

use Dev\Infrastructure\Model\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        User::create(['name' => 'Admin Ahmed', 'phone' => '01014158911', 'email' => 'ahmed@medical_egy.com', 'password' => bcrypt('password'), 'type' => 'user']);
        User::create(['name' => 'Super admin', 'phone' => '01558225599', 'email' => 'admin@medical_egy.com', 'password' => bcrypt('password'), 'type' => 'user']);
//        User::factory(50)->create();
    }
}
