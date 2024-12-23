<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchProject;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $researchProjects = ResearchProject::with('user', 'task', 'creator:id,name')->latest()->get();
        $statuses = ResearchProject::STATUS_ARR;

        return view('admin.research-projects.index', compact('researchProjects', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ResearchProject::STATUS_ARR;

        $users = User::latest()->get();
        $tasks = Task::latest()->get();

        return view('admin.research-projects.form', compact('users', 'tasks', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'task' => 'required|integer|exists:tasks,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:proposed,in_progress,on_hold,completed,cancelled'
        ]);

        try {

            ResearchProject::create([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Research project created successfully", "Success");

            return to_route('research-projects.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ResearchProject $researchProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResearchProject $researchProject)
    {
        $statuses = ResearchProject::STATUS_ARR;

        $users = User::latest()->get();
        $tasks = Task::latest()->get();

        return view('admin.research-projects.form', compact('users', 'tasks', 'statuses', 'researchProject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResearchProject $researchProject)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'task' => 'required|integer|exists:tasks,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:proposed,in_progress,on_hold,completed,cancelled'
        ]);

        try {

            $researchProject->update([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Research project updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResearchProject $researchProject)
    {
        try {
            $researchProject->delete();
            notify()->success('Research project deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
