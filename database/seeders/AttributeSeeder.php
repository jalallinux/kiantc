<?php

namespace Database\Seeders;

use App\Models\Attribute;

class AttributeSeeder extends BaseSeeder
{
    const ITEMS = [
        'Color',
        'Material',
        'Size',
    ];

    protected function initialize()
    {
        Attribute::factory()->createMany(
            collect(self::ITEMS)->map(fn ($item) => ['title' => $item])
        );
    }

    protected function fake()
    {
        //
    }
}
