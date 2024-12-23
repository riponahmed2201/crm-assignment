<?php

namespace Database\Seeders;

use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $performances = [
            [
                'user_id' => 1,
                'task_id' => 1,
                'grade' => 'A',
                'completion_percentage' => '95%',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'task_id' => 2,
                'grade' => 'B+',
                'completion_percentage' => '88%',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 3,
                'grade' => 'A-',
                'completion_percentage' => '92%',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 4,
                'grade' => 'B',
                'completion_percentage' => '85%',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Performance::insert($performances);
    }
}
