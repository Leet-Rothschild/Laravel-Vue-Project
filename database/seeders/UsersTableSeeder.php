<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jobert Alegre',
            'email' => 'jobert@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}

