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
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'mobile_number' => fake()->unique()->numerify('091########'),
            'password' => '123456',
            'created_at' => $createdAt = fake()->dateTimeBetween('-1 years'),
            'updated_at' => $createdAt,
        ];
    }
}
