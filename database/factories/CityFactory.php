<?php

namespace Database\Factories;

use Dev\Infrastructure\Model\DoctorCategory;
use Dev\Infrastructure\Model\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ArFaker = \Faker\Factory::create('ar_AA'); // create a Arabic faker
        $name['ar'] = $ArFaker->city;
        $description['ar'] = $ArFaker->text;

        $name ['en'] = $this->faker->city;
        $description['en'] = $this->faker->text;
        return [
            'name' => $name,
            'description' =>$description
        ];
    }
}
