<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialCategory;
use App\Models\FinancialTracker;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $financialTrackers = FinancialTracker::with('user', 'category', 'creator:id,name')->latest()->get();

        $statuses = FinancialTracker::STATUS_ARR;

        return view('admin.financial-trackers.index', compact('statuses', 'financialTrackers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = FinancialTracker::STATUS_ARR;

        $financialCategories = FinancialCategory::latest()->get();
        $users = User::latest()->get();

        return view('admin.financial-trackers.form', compact('statuses', 'financialCategories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:financial_categories,id',
            'title' => 'required|string|max:255',
            'amount' => 'required',
            'due_date' => 'required|max:20',
            'status' => 'required|string|in:pending,received'
        ]);

        try {

            FinancialTracker::create([
                'user_id' => $request->user_name,
                'category_id' => $request->category,
                'title' => $request->title,
                'amount' => $request->amount,
                'due_date' => $request->due_date,
                'status' => $request->status,
                'description' => $request->description,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Financial tracker created successfully", "Success");

            return to_route('financial-trackers.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialTracker $financialTracker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialTracker $financialTracker)
    {
        $statuses = FinancialTracker::STATUS_ARR;

        $financialCategories = FinancialCategory::latest()->get();
        $users = User::latest()->get();

        return view('admin.financial-trackers.form', compact('statuses', 'financialCategories', 'users', 'financialTracker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialTracker $financialTracker)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:financial_categories,id',
            'title' => 'required|string|max:255',
            'amount' => 'required',
            'due_date' => 'required|max:20',
            'status' => 'required|string|in:pending,received'
        ]);

        try {

            $financialTracker->update([
                'user_id' => $request->user_name,
                'category_id' => $request->category,
                'title' => $request->title,
                'amount' => $request->amount,
                'due_date' => $request->due_date,
                'status' => $request->status,
                'description' => $request->description,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Financial tracker updated successfully", "Success");

            return to_route('financial-trackers.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialTracker $financialTracker)
    {
        try {
            $financialTracker->delete();
            notify()->success('Financial tracker deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
