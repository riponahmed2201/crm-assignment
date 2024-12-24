<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890',
                'department' => 'Computer Science',
                'batch' => '2023',
                'program' => 'BSc CS',
                'date_of_birth' => '2000-05-15',
                'address' => '123 Main Street, City, Country',
                'created_by' => 1, // Assuming user ID 1 exists
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone' => '0987654321',
                'department' => 'Electrical Engineering',
                'batch' => '2022',
                'program' => 'BE EE',
                'date_of_birth' => '1999-11-22',
                'address' => '456 Secondary Road, City, Country',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'phone' => '5556667777',
                'department' => 'Mechanical Engineering',
                'batch' => '2024',
                'program' => 'BTech ME',
                'date_of_birth' => '2001-03-30',
                'address' => '789 Tertiary Lane, City, Country',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Student::insert($students);
    }
}
