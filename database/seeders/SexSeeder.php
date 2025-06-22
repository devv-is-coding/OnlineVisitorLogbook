<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sex;

class SexSeeder extends Seeder
{

    public function run(): void
    {
        Sex::insert([
            ['sex' => 'Male'],
            ['sex' => 'Female'],
            ['sex' => 'Prefer not to say'],
        ]);
    }
}
