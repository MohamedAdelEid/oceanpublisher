<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Account',
            'full_name' => 'Admin Account',
            'phone' => '1234567890',
            'email' => 'admin@gmail.com',
            'email_verified_at' => time(),
        	'password' => Hash::make('12345678'),
        	'is_admin' => true,
        	'status' => 'active',
        ]);
    }
}
