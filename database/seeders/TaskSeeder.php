<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $tasks = [
            [
                'user_id' => 1,
                'title' => 'Finish Thesis Introduction',
                'description' => 'Complete the first draft of the thesis introduction.',
                'category_id' => 1, // Assuming category 1 exists in the task_categories table
                'due_date' => $now->addDays(3),
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Prepare for AI Conference',
                'description' => 'Review notes and create a presentation for the AI conference next week.',
                'category_id' => 4, // Assuming category 4 exists in the task_categories table
                'due_date' => $now->addDays(5),
                'status' => 'in_progress',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Submit Research Paper Draft',
                'description' => 'Submit the first draft of the research paper for review.',
                'category_id' => 2, // Assuming category 2 exists in the task_categories table
                'due_date' => $now->addWeeks(1),
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Study for Final Exam',
                'description' => 'Start reviewing materials for the upcoming final exam in Data Science.',
                'category_id' => 3, // Assuming category 3 exists in the task_categories table
                'due_date' => $now->addWeeks(2),
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Task::insert($tasks);
    }
}
