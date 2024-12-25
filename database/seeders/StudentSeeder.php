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
                'name' => 'Subarna Islam',
                'email' => 'subarnaislam@gmail.com',
                'phone' => '1234567890',
                'department' => 'Computer Science',
                'batch' => '2023',
                'program' => 'BSc CS',
                'student_id' => '242-0081-015',
                'date_of_birth' => '2000-05-15',
                'address' => '123 Main Street, City, Country',
                'profile_picture' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Md. Shariful Islam',
                'email' => 'sharifulislam@gmail.com',
                'phone' => '0987654321',
                'department' => 'Electrical Engineering',
                'batch' => '2023',
                'program' => 'BE EE',
                'student_id' => '242-0285-032',
                'date_of_birth' => '1999-11-22',
                'address' => '456 Secondary Road, City, Country',
                'profile_picture' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Md. Abid Hossain',
                'email' => 'abidhossain@gmail.com',
                'phone' => '5556667777',
                'department' => 'Mechanical Engineering',
                'batch' => '2023',
                'program' => 'BTech ME',
                'student_id' => '242-0286-032',
                'date_of_birth' => '2001-03-30',
                'address' => '789 Tertiary Lane, City, Country',
                'profile_picture' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Umma Habiba',
                'email' => 'ummahabiba@gmail.com',
                'phone' => '5556667777',
                'department' => 'Mechanical Engineering',
                'batch' => '2023',
                'program' => 'BTech ME',
                'student_id' => '242-0270-015',
                'date_of_birth' => '2001-03-30',
                'address' => '789 Tertiary Lane, City, Country',
                'profile_picture' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Litan Mia',
                'email' => 'litanmia@gmail.com',
                'phone' => '5556667777',
                'department' => 'Mechanical Engineering',
                'batch' => '2023',
                'program' => 'BTech ME',
                'student_id' => '241-0307-014',
                'date_of_birth' => '2001-03-30',
                'address' => '789 Tertiary Lane, City, Country',
                'profile_picture' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Student::insert($students);
    }
}
