<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $contacts = [
            [
                'user_id' => 1,
                'name' => 'Dr. John Smith',
                'academic_role_id' => 1, // Professor
                'organization' => 'University of Science',
                'email' => 'john.smith@uniscience.edu',
                'phone' => '123-456-7890',
                'notes' => 'Thesis supervisor for quantum computing.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'name' => 'Emily Johnson',
                'academic_role_id' => 2, // Peer
                'organization' => 'University of Science',
                'email' => 'emily.johnson@uniscience.edu',
                'phone' => '987-654-3210',
                'notes' => 'Classmate and project collaborator.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'name' => 'Mr. Alan Brown',
                'academic_role_id' => 3, // Industry Connection
                'organization' => 'Tech Innovators Inc.',
                'email' => 'alan.brown@techinnovators.com',
                'phone' => '555-555-5555',
                'notes' => 'Contact from career fair for potential internship.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'name' => 'Dr. Alice Green',
                'academic_role_id' => 1, // Professor
                'organization' => 'National Research Lab',
                'email' => 'alice.green@nrl.gov',
                'phone' => '444-444-4444',
                'notes' => 'Advisor for research collaboration.',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Contact::insert($contacts);
    }
}
