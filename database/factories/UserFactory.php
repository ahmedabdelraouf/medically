<?php

namespace Database\Factories;

use Dev\Infrastructure\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeArr = ['user'];
        $genderArr = ['male', 'female'];
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'image' => $this->faker->imageUrl(),
            'email_verified_at' => now(),
            "type" => $typeArr[array_rand($typeArr)],
            "gender" => $genderArr[array_rand($genderArr)],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
