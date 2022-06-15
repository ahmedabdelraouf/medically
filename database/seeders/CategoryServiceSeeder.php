<?php

namespace Database\Seeders;

use Dev\Infrastructure\Model\DoctorCategory;
use Illuminate\Database\Seeder;

class DoctorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorCategory::query()->truncate();
        DoctorCategory::factory(5)->create();
    }
}
