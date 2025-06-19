<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        
        $visitor = Visitor::create([
            'firstname' => 'John',
            'middlename' => 'Smith',
            'lastname' => 'Doe',
            'age' => 20,
            'purpose_of_visit' => 'Business',
            'contact_number' => '09123456789',
        ]);
        $visitorSex = Sex::where('sex', 'Male')->first();
        $visitor->sexes()->attach($visitorSex->id);

        Admin::create([
            'username' => 'admin',
            'email' => 'admin@me.com',
            'password' => hash::make('password'),
            'contact' => '09123456789',
        ]);

    }
}
