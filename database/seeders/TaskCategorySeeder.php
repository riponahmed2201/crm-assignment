<?php

namespace Database\Seeders;

use App\Models\TaskCategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            ['category_name' => 'Assignment', 'description' => 'Course-related tasks.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Research', 'description' => 'Thesis or research-related tasks.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Exam Preparation', 'description' => 'Tasks for studying for exams.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Networking', 'description' => 'Building and maintaining professional connections.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Administrative', 'description' => 'University paperwork, registrations, or payments.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Personal Development', 'description' => 'Self-improvement or extracurricular tasks.', 'created_at' => $now, 'updated_at' => $now],
        ];

        TaskCategory::insert($categories);
    }
}
