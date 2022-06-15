<?php

namespace Database\Factories;

use Dev\Infrastructure\Model\ContactUs;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactUs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = array(0, 1);
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber,
            'message' => $this->faker->text,
            'status' => $statuses[array_rand($statuses)],
        ];
    }
}
