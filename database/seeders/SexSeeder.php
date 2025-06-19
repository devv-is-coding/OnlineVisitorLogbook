<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sex;

class SexSeeder extends Seeder
{

    public function run(): void
    {
        $sexes = ['Male', 'Female', 'Prefer not to say'];
        foreach ($sexes as $sex) {
            Sex::create(['sex' => $sex]);
        }
    }
}
