<?php

namespace Database\Seeders;

use App\Models\DoctorCategory;
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
        DoctorCategory::create(['name' => 'Dentist1', 'description' => 'description']);
        DoctorCategory::create(['name' => 'Dentist2', 'description' => 'description']);
        DoctorCategory::create(['name' => 'Dentist3', 'description' => 'description']);
    }
}
