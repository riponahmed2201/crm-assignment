<?php

namespace Database\Seeders;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $documents = [
            [
                'user_id' => 1,
                'title' => 'Thesis Draft 1',
                'file_path' => 'documents/user1/thesis_draft_1.pdf',
                'tags' => 'thesis, draft, research',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'Quantum Computing Notes',
                'file_path' => 'documents/user1/quantum_computing_notes.docx',
                'tags' => 'notes, quantum computing, classwork',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'title' => 'AI Conference Paper',
                'file_path' => 'documents/user2/ai_conference_paper.pdf',
                'tags' => 'conference, AI, paper',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'title' => 'Machine Learning Presentation',
                'file_path' => 'documents/user2/ml_presentation.pptx',
                'tags' => 'presentation, machine learning, slides',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Document::insert($documents);
    }
}
