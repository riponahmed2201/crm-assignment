<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MeetingLog;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MeetingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetingLogsQuery = MeetingLog::with(['user', 'contact', 'creator:id,name'])->latest();

        if (Auth::user()->role === 'student') {
            $meetingLogsQuery->where('user_id', Auth::id());
        }

        $meetingLogs = $meetingLogsQuery->get();

        return view('admin.meeting-logs.index', compact('meetingLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();
        $contacts = Contact::latest()->get();

        return view('admin.meeting-logs.form', compact('users', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'contact' => 'required|integer|exists:contacts,id',
            'meeting_date' => 'required|date',
            'follow_up_date' => 'required|date',
            'notes' => 'required|string',
        ]);

        $input = [
            'user_id' => $request->user,
            'contact_id' => $request->contact,
            'meeting_date' => $request->meeting_date,
            'follow_up_date' => $request->follow_up_date,
            'notes' => $request->notes,
            'created_by' => Auth::id(),
            'created_at' => now(),
        ];

        $filePath = $request->file('file');

        if ($filePath) {
            $filePathName = md5(Str::random(30) . time() . '_' . $request->file('file')) . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move('uploads/meeting-logs/', $filePathName);
            $input['file'] = $filePathName;
        }

        try {

            MeetingLog::create($input);

            notify()->success("Meeting log created successfully", "Success");

            return to_route('meeting-logs.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingLog $MeetingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingLog $meetingLog)
    {
        $users = User::latest()->get();
        $contacts = Contact::latest()->get();

        return view('admin.meeting-logs.form', compact('users', 'contacts', 'meetingLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingLog $meetingLog)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'contact' => 'required|integer|exists:contacts,id',
            'meeting_date' => 'required|date',
            'follow_up_date' => 'required|date',
            'notes' => 'required|string',
        ]);

        try {

            $meetingLog->update([
                'user_id' => $request->user,
                'contact_id' => $request->contact,
                'meeting_date' => $request->meeting_date,
                'follow_up_date' => $request->follow_up_date,
                'notes' => $request->notes,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Meeting log updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingLog $meetingLog)
    {
        try {
            $meetingLog->delete();
            notify()->success('Meeting log deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
