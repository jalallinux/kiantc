<?php

namespace Database\Seeders;

use App\Models\User;

class UserSeeder extends BaseSeeder
{
    protected function initialize()
    {
        User::factory()->create([
            'first_name' => 'Smj',
            'last_name' => 'JalalZadeh',
            'mobile_number' => '09177876563',
        ]);
    }

    protected function fake()
    {
        User::factory(10)->create();
    }
}
