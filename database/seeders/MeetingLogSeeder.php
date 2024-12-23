<?php

namespace Database\Seeders;

use App\Models\MeetingLog;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $logs = [
            [
                'user_id' => 1,
                'contact_id' => 1,
                'meeting_date' => '2024-11-10 14:00:00',
                'file' => 'meeting-logs/user2/ml_presentation.pptx',
                'notes' => 'Discussed potential research collaboration on AI.',
                'follow_up_date' => '2024-11-20 10:00:00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'contact_id' => 2,
                'meeting_date' => '2024-11-15 10:00:00',
                'file' => 'meeting-logs/user2/ml_presentation.pptx',
                'notes' => 'Met during a university networking event. Agreed to share project insights.',
                'follow_up_date' => '2024-11-25 11:00:00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'contact_id' => 3,
                'meeting_date' => '2024-11-12 16:00:00',
                'file' => 'meeting-logs/user2/ml_presentation.pptx',
                'notes' => 'Reviewed current trends in quantum computing.',
                'follow_up_date' => '2024-11-22 15:00:00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'contact_id' => 4,
                'meeting_date' => '2024-11-18 09:00:00',
                'file' => 'meeting-logs/user2/ml_presentation.pptx',
                'notes' => 'Initial meeting for industry connection. Exchanged contact details.',
                'follow_up_date' => '2024-11-28 09:30:00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        MeetingLog::insert($logs);
    }
}
