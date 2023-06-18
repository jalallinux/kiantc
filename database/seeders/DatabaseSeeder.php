<?php

namespace Database\Seeders;

class DatabaseSeeder extends BaseSeeder
{
    protected function initialize()
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            AttributeSeeder::class,
            AttributeProductSeeder::class,
        ]);
    }

    protected function fake()
    {
        //
    }
}
