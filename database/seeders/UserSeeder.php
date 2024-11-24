<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '01746-000000',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'deletable' => false
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '01740-000000',
                'role' => 'user',
                'password' => Hash::make('password'),
                'deletable' => false
            ]
        ];

        User::insert($users);

        $this->command->info('Admin user created successfully.');
    }
}
