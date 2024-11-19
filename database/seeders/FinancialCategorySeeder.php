<?php

namespace Database\Seeders;

use App\Models\FinancialCategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            ['category_name' => 'Tuition Fee', 'description' => 'Payments for semester or course enrollment.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Scholarship', 'description' => 'Funds received as part of a scholarship program.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Stipend', 'description' => 'Monthly or periodic financial support for research or teaching assistance.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Grants', 'description' => 'Funding received for specific projects or research activities.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Accommodation', 'description' => 'Rent or dormitory payments for housing.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Utilities', 'description' => 'Bills for electricity, water, internet, or other essential services.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Books & Supplies', 'description' => 'Expenses for textbooks, research materials, and stationery.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Travel', 'description' => 'Transportation costs for academic purposes (e.g., conferences, fieldwork).', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Conference Fees', 'description' => 'Registration or participation fees for academic conferences.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Administrative Fees', 'description' => 'Charges for administrative processes like applications, transcripts, or document processing.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Research Expenses', 'description' => 'Costs related to lab work, software, or materials for thesis or projects.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Health & Insurance', 'description' => 'Medical expenses or health insurance premiums.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Part-time Income', 'description' => 'Earnings from part-time jobs or freelance work.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Personal Expenses', 'description' => 'General personal expenditures unrelated to academics.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Loan Repayment', 'description' => 'Payments made toward student loans or other borrowed funds.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Savings', 'description' => 'Money set aside for future use.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Food & Groceries', 'description' => 'Daily living expenses for meals and groceries.', 'created_at' => $now, 'updated_at' => $now],
            ['category_name' => 'Miscellaneous', 'description' => 'Any other expenses or income that don’t fit into the above categories.', 'created_at' => $now, 'updated_at' => $now],
        ];

        FinancialCategory::insert($categories);
    }
}
