<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttributeProduct>
 */
class AttributeProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->randomElement(Product::query()->pluck('id')->toArray()),
            'attribute_id' => fake()->randomElement(Attribute::query()->pluck('id')->toArray()),
        ];
    }
}
