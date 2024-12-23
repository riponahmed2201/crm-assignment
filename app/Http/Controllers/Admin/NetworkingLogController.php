<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\NetworkingLog;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $networkingLogs = NetworkingLog::with('user', 'contact', 'creator:id,name')->latest()->get();

        return view('admin.networking-logs.index', compact('networkingLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();
        $contacts = Contact::latest()->get();

        return view('admin.networking-logs.form', compact('users', 'contacts'));
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

        try {

            NetworkingLog::create([
                'user_id' => $request->user,
                'contact_id' => $request->contact,
                'meeting_date' => $request->meeting_date,
                'follow_up_date' => $request->follow_up_date,
                'notes' => $request->notes,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Networking log created successfully", "Success");

            return to_route('networking-logs.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NetworkingLog $networkingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NetworkingLog $networkingLog)
    {
        $users = User::latest()->get();
        $contacts = Contact::latest()->get();

        return view('admin.networking-logs.form', compact('users', 'contacts', 'networkingLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NetworkingLog $networkingLog)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'contact' => 'required|integer|exists:contacts,id',
            'meeting_date' => 'required|date',
            'follow_up_date' => 'required|date',
            'notes' => 'required|string',
        ]);

        try {

            $networkingLog->update([
                'user_id' => $request->user,
                'contact_id' => $request->contact,
                'meeting_date' => $request->meeting_date,
                'follow_up_date' => $request->follow_up_date,
                'notes' => $request->notes,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Networking log updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NetworkingLog $networkingLog)
    {
        try {
            $networkingLog->delete();
            notify()->success('Networking log deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
