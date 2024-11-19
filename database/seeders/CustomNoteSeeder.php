<?php

namespace Database\Seeders;

use App\Models\CustomNote;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $notes = [
            [
                'user_id' => 1,
                'title' => 'Research Paper Idea',
                'content' => 'Start working on the AI-based research paper on NLP.',
                'tags' => 'research, AI, NLP, paper',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Networking Event Reminder',
                'content' => 'Don’t forget to attend the tech conference next week.',
                'tags' => 'networking, conference, reminder',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'title' => 'Meeting with Prof. Smith',
                'content' => 'Discuss the progress of the thesis and next steps.',
                'tags' => 'meeting, professor, thesis',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'title' => 'Admin Task: Fee Payment',
                'content' => 'Pay the semester fee by the 15th of the month.',
                'tags' => 'administrative, fees, payment',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        CustomNote::insert($notes);
    }
}
