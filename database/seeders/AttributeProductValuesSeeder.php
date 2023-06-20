<?php

namespace Database\Seeders;


use App\Models\AttributeProductValues;

class AttributeProductValuesSeeder extends BaseSeeder
{
    protected function initialize()
    {
        //
    }

    protected function fake()
    {
        AttributeProductValues::factory(500)->create();
    }
}
