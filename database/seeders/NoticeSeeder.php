<?php

namespace Database\Seeders;

use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notices = [
            [
                'title' => 'Server Maintenance',
                'description' => 'The server will be under maintenance on Friday from 1 AM to 5 AM.',
                'type' => 'urgent',
                'priority' => 'high',
                'published_at' => Carbon::now()->subDays(2),
                'expires_at' => Carbon::now()->addDays(3),
                'status' => 'published',
                'created_by' => 1, // Assuming user ID 1 exists
                'updated_by' => 1,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Annual General Meeting',
                'description' => 'The AGM will be held on December 15th at 10 AM in the conference room.',
                'type' => 'info',
                'priority' => 'medium',
                'published_at' => Carbon::now()->subDays(5),
                'expires_at' => Carbon::now()->addDays(7),
                'status' => 'published',
                'created_by' => 2, // Assuming user ID 2 exists
                'updated_by' => null,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Office Renovation',
                'description' => 'The office renovation will start next week. Please clear your desks by Monday.',
                'type' => 'general',
                'priority' => 'low',
                'published_at' => Carbon::now()->subDays(3),
                'expires_at' => null,
                'status' => 'draft',
                'created_by' => 3, // Assuming user ID 3 exists
                'updated_by' => null,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Holiday Announcement',
                'description' => 'The office will remain closed on December 25th for Christmas.',
                'type' => 'info',
                'priority' => 'medium',
                'published_at' => Carbon::now()->subDays(1),
                'expires_at' => Carbon::now()->addDays(5),
                'status' => 'published',
                'created_by' => 1, // Assuming user ID 1 exists
                'updated_by' => 1,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Policy Update',
                'description' => 'The company has updated its work-from-home policy. Please refer to the HR portal.',
                'type' => 'general',
                'priority' => 'medium',
                'published_at' => null,
                'expires_at' => null,
                'status' => 'draft',
                'created_by' => 2, // Assuming user ID 2 exists
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Notice::insert($notices);
    }
}
