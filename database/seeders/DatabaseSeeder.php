<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Sex;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SexSeeder::class
        ]);

        $visitorSex = Sex::where('sex', 'Male')->first();
        Visitor::create([
            'firstname' => 'John',
            'middlename' => 'Smith',
            'lastname' => 'Doe',
            'age' => 20,
            'sex_id' => $visitorSex->id,
            'purpose_of_visit' => 'Business',
            'contact_number' => '09123456789',
        ]);
        Admin::create([
            'username' => 'admin',
            'email' => 'admin@me.com',
            'password' => Hash::make('password'),
            'contact' => '09123456789',
        ]);
    }
}
