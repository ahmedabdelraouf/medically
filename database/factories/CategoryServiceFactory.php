<?php

namespace Database\Factories;

use Dev\Infrastructure\Model\DoctorCategory;
use Database\Factories\Traits\TraitFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorCategoryFactory extends Factory
{
    use TraitFactory;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoctorCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $ArFaker = \Faker\Factory::create('ar_AA'); // create a Arabic faker
        $name['ar'] = $ArFaker->name;
        $description['ar'] = $ArFaker->text;
        $name ['en'] = $this->faker->name;
        $description['en'] = $this->faker->text;
        return [
            'name' => $name,
            'description' => $description,
            'image' => null
        ];
    }
}
