<?php

namespace Database\Seeders;

use App\Models\AttributeProduct;

class AttributeProductSeeder extends BaseSeeder
{

    protected function initialize()
    {
        //
    }

    protected function fake()
    {
        AttributeProduct::factory(300)->create();
    }
}
