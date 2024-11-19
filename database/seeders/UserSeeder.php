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
        User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Admin',
                'phone' => '01746-000000',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'deletable' => false
            ]
        );

        $this->command->info('Admin user created successfully.');
    }
}
