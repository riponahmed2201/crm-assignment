<?php

namespace Database\Seeders;

use App\Models\ResearchProject;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $projects = [
            [
                'user_id' => 1,
                'task_id' => 1,
                'title' => 'AI Research on Natural Language Processing',
                'description' => 'Research focused on enhancing NLP techniques for automated translations.',
                'status' => 'in_progress',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'task_id' => 2,
                'title' => 'Quantum Computing for Cryptography',
                'description' => 'Exploring quantum computing algorithms for secure cryptography methods.',
                'status' => 'proposed',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 3,
                'title' => 'Autonomous Vehicles and AI',
                'description' => 'Study on the integration of machine learning algorithms into autonomous vehicle navigation systems.',
                'status' => 'completed',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 4,
                'title' => 'Blockchain Applications in Supply Chain',
                'description' => 'Research to explore the applications of blockchain technology in optimizing supply chain management.',
                'status' => 'on_hold',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        ResearchProject::insert($projects);
    }
}
