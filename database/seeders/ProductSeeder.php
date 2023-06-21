<?php

namespace Database\Seeders;

use App\Models\Product;

class ProductSeeder extends BaseSeeder
{
    protected function initialize()
    {
        //
    }

    protected function fake()
    {
        Product::factory(30)->create();
    }
}
