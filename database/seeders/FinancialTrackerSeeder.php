<?php

namespace Database\Seeders;

use App\Models\FinancialTracker;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialTrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $trackers = [
            [
                'user_id' => 1,
                'title' => 'Semester Tuition Fee',
                'amount' => 5000.00,
                'category_id' => 1,
                'due_date' => '2024-12-01',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Monthly Stipend',
                'amount' => 1000.00,
                'category_id' => 2,
                'due_date' => '2024-11-01',
                'status' => 'received',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Conference Travel Expense',
                'amount' => 300.00,
                'category_id' => 3,
                'due_date' => '2024-11-25',
                'status' => 'pending',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Book Purchase',
                'amount' => 120.00,
                'category_id' => 4,
                'due_date' => '2024-11-15',
                'status' => 'received',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Scholarship Award',
                'amount' => 2000.00,
                'category_id' => 5,
                'due_date' => '2024-08-01',
                'status' => 'received',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        FinancialTracker::insert($trackers);
    }
}
