<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendarEvents = CalendarEvent::with('user:id,name', 'task:id,title', 'creator:id,name')->latest()->get();

        return view('admin.calendar-events.index', compact('calendarEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::latest()->get();
        $users = User::latest()->get();

        return view('admin.calendar-events.form', compact('tasks', 'users'));
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
            'event_date' => 'required|max:20',
            'reminder' => 'required|boolean|in:1,0'
        ]);

        try {

            CalendarEvent::create([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'title' => $request->title,
                'event_date' => $request->event_date,
                'reminder' => $request->reminder,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Calendar event created successfully", "Success");

            return to_route('calendar-events.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarEvent $calendarEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarEvent $calendarEvent)
    {
        $tasks = Task::latest()->get();
        $users = User::latest()->get();

        return view('admin.calendar-events.form', compact('tasks', 'users', 'calendarEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalendarEvent $calendarEvent)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'task' => 'required|integer|exists:tasks,id',
            'title' => 'required|string|max:255',
            'event_date' => 'required|max:20',
            'reminder' => 'required|boolean|in:1,0'
        ]);

        try {

            $calendarEvent->update([
                'user_id' => $request->user_name,
                'task_id' => $request->task,
                'title' => $request->title,
                'event_date' => $request->event_date,
                'reminder' => $request->reminder,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Calendar event updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarEvent $calendarEvent)
    {
        try {
            $calendarEvent->delete();
            notify()->success('Calendar event deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
