<?php

namespace Database\Seeders;

use App\Models\CalendarEvent;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $events = [
            [
                'user_id' => 1,
                'task_id' => 1,
                'title' => 'Submit Quantum Computing Assignment',
                'event_date' => '2024-11-25 15:00:00',
                'reminder' => true,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'task_id' => 2,
                'title' => 'Conference: AI and Machine Learning',
                'event_date' => '2024-11-30 10:00:00',
                'reminder' => true,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 2,
                'title' => 'Research Progress Meeting with Advisor',
                'event_date' => '2024-12-01 14:00:00',
                'reminder' => false,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'task_id' => 1,
                'title' => 'Networking Event at Tech Fair',
                'event_date' => '2024-12-05 18:00:00',
                'reminder' => true,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        CalendarEvent::insert($events);
    }
}
