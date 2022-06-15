<?php

namespace Database\Seeders;

use Dev\Infrastructure\Model\ContactUs;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::query()->truncate();
        ContactUs::factory(50)->create();
    }
}
