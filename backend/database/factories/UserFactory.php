<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lname' => fake()->lastName,
            'fname' => fake()->firstName,
            'mobile' => fake()->phoneNumber,
            'course' => $this->faker->randomElement(['BSIT','BSN','BSED','BSCRIM','BSHM']),
            'year' => $this->faker->randomElement(['1st Year','2nd Year','3rd Year','4th Year']),
            'address' => $this->faker->address,
            'email' => fake()->safeEmail(),
            'password' => bcrypt('password123'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
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
