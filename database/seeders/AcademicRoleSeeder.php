<?php

namespace Database\Seeders;

use App\Models\AcademicRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $roles = [
            [
                'role_name' => 'Professor',
                'description' => 'Faculty members supervising or teaching students.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'role_name' => 'Peer',
                'description' => 'Classmates or colleagues working together on academic projects.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'role_name' => 'Industry Connection',
                'description' => 'Professionals from the industry for networking or collaboration.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'role_name' => 'University Staff',
                'description' => 'Administrative or technical staff at the university.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'role_name' => 'Mentor',
                'description' => 'Guides offering advice and expertise on academic or career goals.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        AcademicRole::insert($roles);
    }
}
