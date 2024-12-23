<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskCategories = TaskCategory::with('creator:id,name')->latest()->get();

        return view('admin.task-categories.index', compact('taskCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.task-categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:task_categories',
            'description' => 'required|string',
        ]);

        try {

            TaskCategory::create([
                'category_name' => $request->input('category_name'),
                'description' => $request->input('description'),
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Task category created successfully", "Success");

            return to_route('task-categories.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskCategory $taskCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskCategory $taskCategory)
    {
        return view('admin.task-categories.form', compact('taskCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskCategory $taskCategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:task_categories',
            'description' => 'required|string',
        ]);

        try {

            $taskCategory->update([
                'category_name' => $request->input('category_name'),
                'description' => $request->input('description'),
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Task category updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskCategory $taskCategory)
    {
        try {
            $taskCategory->delete();
            notify()->success('Task category deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
