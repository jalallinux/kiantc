<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends BaseSeeder
{
    protected function initialize()
    {
        Artisan::call('passport:install', [
            '--force' => true,
        ]);
        Artisan::call('passport:keys', [
            '--force' => true,
        ]);
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            AttributeSeeder::class,
            AttributeProductSeeder::class,
            AttributeProductValuesSeeder::class,
        ]);
    }

    protected function fake()
    {
        //
    }
}
