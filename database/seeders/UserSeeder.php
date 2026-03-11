<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Demo User',
            'email' => 'user@example.com',
            'phone' => '8618461119',
            'password' => Hash::make('password'), // don't forget to hash!
        ]);
    }
}
