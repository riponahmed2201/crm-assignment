<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TaskCategorySeeder::class,
            TaskSeeder::class,
            CalendarEventSeeder::class,
            FinancialCategorySeeder::class,
            FinancialTrackerSeeder::class,
            AcademicRoleSeeder::class,
            ContactSeeder::class,
            DocumentSeeder::class,
            MeetingLogSeeder::class,
            ResearchProjectSeeder::class,
            PerformanceSeeder::class,
            CustomNoteSeeder::class,
            NoticeSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
