<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Task::STATUS_ARR;

        $taskQuery = Task::with('category:id,category_name', 'user:id,name', 'creator:id,name')->latest();

        if (Auth::user()->role === 'student') {
            $taskQuery->where('user_id', Auth::id());
        }

        $tasks = $taskQuery->get();

        return view('admin.tasks.index', compact('tasks', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskCategories = TaskCategory::latest()->get();
        $users = User::latest()->get();

        $statuses = Task::STATUS_ARR;

        return view('admin.tasks.form', compact('taskCategories', 'users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:task_categories,id',
            'title' => 'required|string|max:255',
            'due_date' => 'required|max:20',
            'status' => 'required|string|in:pending,in_progress,completed',
            'description' => 'required|string',
        ]);

        $input = [
            'user_id' => $request->user_name,
            'category_id' => $request->category,
            'title' => $request->title,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'description' => $request->description,
            'created_by' => Auth::id(),
            'created_at' => now(),
        ];

        $filePath = $request->file('file');

        if ($filePath) {
            $filePathName = md5(Str::random(30) . time() . '_' . $request->file('file')) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move('uploads/tasks/', $filePathName);
            $input['file'] = $filePathName;
        }

        try {

            Task::create($input);

            notify()->success("Task created successfully", "Success");

            return to_route('tasks.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $taskCategories = TaskCategory::latest()->get();
        $users = User::latest()->get();
        $statuses = Task::STATUS_ARR;

        return view('admin.tasks.form', compact('taskCategories', 'users', 'task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:task_categories,id',
            'title' => 'required|string|max:255',
            'due_date' => 'required|max:20',
            'status' => 'required|string|in:pending,in_progress,completed',
            'description' => 'required|string',
        ]);

        $input = [
            'user_id' => $request->user_name,
            'category_id' => $request->category,
            'title' => $request->title,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'description' => $request->description,
            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ];

        $filePath = $request->file('file');

        if ($filePath) {
            $filePathName = md5(Str::random(30) . time() . '_' . $request->file('file')) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move('uploads/tasks/', $filePathName);

            if (file_exists('uploads/tasks/' . $task->file) && !empty($task->file)) {
                unlink('uploads/tasks/' . $task->file);
            }

            $input['file'] = $filePathName;
        } else {
            $input['file'] = $task->file_path;
        }

        try {

            $task->update($input);

            notify()->success("Task updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            notify()->success('Task deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
