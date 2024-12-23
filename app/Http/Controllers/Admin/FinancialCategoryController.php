<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financialCategories = FinancialCategory::with('creator:id,name')->latest()->get();

        return view('admin.financial-categories.index', compact('financialCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.financial-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:financial_categories',
            'description' => 'required|string',
        ]);

        try {

            FinancialCategory::create([
                'category_name' => $request->input('category_name'),
                'description' => $request->input('description'),
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Financial category created successfully", "Success");

            return to_route('financial-categories.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialCategory $financialCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialCategory $financialCategory)
    {
        return view('admin.financial-categories.form', compact('financialCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialCategory $financialCategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:financial_categories',
            'description' => 'required|string',
        ]);

        try {

            $financialCategory->update([
                'category_name' => $request->input('category_name'),
                'description' => $request->input('description'),
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Financial category updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialCategory $financialCategory)
    {
        try {
            $financialCategory->delete();
            notify()->success('Financial category deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
