<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::query()->pluck('id')->toArray()),
            'title' => $title = fake()->colorName(),
            'description' => fake()->sentence(10),
            'image_location' => fake()->imageUrl(randomize: false, word: $title),
            'created_at' => $createdAt = fake()->dateTimeBetween('-1 years'),
            'updated_at' => $createdAt,
        ];
    }
}
