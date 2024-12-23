<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performances = Performance::with('user', 'task', 'creator:id,name')->latest()->get();

        return view('admin.performances.index', compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();
        $tasks = Task::latest()->get();

        return view('admin.performances.form', compact('users', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'task' => 'required|integer|exists:tasks,id',
            'grade' => 'required|string|max:10',
            'completion_percentage' => 'required|string'
        ]);

        try {

            Performance::create([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'grade' => $request->grade,
                'completion_percentage' => $request->completion_percentage,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Performance created successfully", "Success");

            return to_route('performances.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        $users = User::latest()->get();
        $tasks = Task::latest()->get();

        return view('admin.performances.form', compact('users', 'tasks', 'performance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'task' => 'required|integer|exists:tasks,id',
            'grade' => 'required|string|max:10',
            'completion_percentage' => 'required|string'
        ]);

        try {

            $performance->update([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'grade' => $request->grade,
                'completion_percentage' => $request->completion_percentage,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Performance updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
        try {
            $performance->delete();
            notify()->success('Performance deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
