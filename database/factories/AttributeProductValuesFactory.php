<?php

namespace Database\Factories;

use App\Models\AttributeProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttributeProductValues>
 */
class AttributeProductValuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'attribute_product_id' => fake()->randomElement(AttributeProduct::query()->pluck('id')->toArray()),
            'label' => fake()->word,
            'value' => fake()->randomElement([fake()->bothify('????'), fake()->bothify('####')]),
            'price' => fake()->numerify('####0000'),
            'sell_count' => fake()->numberBetween(10, 900),
        ];
    }
}
