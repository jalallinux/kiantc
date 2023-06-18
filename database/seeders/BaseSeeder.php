<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

abstract class BaseSeeder extends Seeder
{
    use WithFaker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->initialize();

        if (app()->environment('local')) {
            $this->fake();
        }
    }

    abstract protected function initialize();

    abstract protected function fake();
}
