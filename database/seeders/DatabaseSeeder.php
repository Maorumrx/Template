<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::insert([
            'name' => 'Admin System',
            'username' => 'admin',
            'email' => 'moarugg@gmail.com',
            'password' => Hash::make('isylzjko'),
            'verify' => 1,
            'register' => 1,
            'active' => 1,
        ]);

        User::insert([
            'name' => 'Demo System',
            'username' => 'demo',
            'email' => 'demo@demo.com',
            'password' => Hash::make('isylzjko'),
            'verify' => 1,
            'register' => 1,
            'active' => 1,
        ]);
    }
}
