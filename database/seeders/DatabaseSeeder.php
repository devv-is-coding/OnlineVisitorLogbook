<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Visitor::create([
            'firstname' => 'Devin',
            'middlename' => 'P.',
            'lastname' => 'Bendano',
            'age' => 20,
            'sex' => 'Male',
            'purpose_of_visit' => 'Business',
            'contact_number' => '09123456789',
        ]);
    }
}
