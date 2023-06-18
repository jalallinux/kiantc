<?php

namespace Database\Seeders;

class DatabaseSeeder extends BaseSeeder
{
    protected function initialize()
    {
        $this->call([
            UserSeeder::class,
        ]);
    }

    protected function fake()
    {
        //
    }
}
