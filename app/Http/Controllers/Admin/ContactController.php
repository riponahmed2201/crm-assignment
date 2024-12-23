<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use App\Models\Contact;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::with('user', 'academicRole', 'creator:id,name')->latest()->get();

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();
        $academicRoles = AcademicRole::latest()->get();

        return view('admin.contacts.form', compact('users', 'academicRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'academic_role' => 'required|integer|exists:academic_roles,id',
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'notes' => 'required|string',
        ]);

        try {

            Contact::create([
                'user_id' => $request->user_name,
                'academic_role_id' => $request->academic_role,
                'name' => $request->name,
                'organization' => $request->organization,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'created_by' => Auth::id(),
                'created_at' => now(),
            ]);

            notify()->success("Contact created successfully", "Success");

            return to_route('contacts.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $users = User::latest()->get();
        $academicRoles = AcademicRole::latest()->get();

        return view('admin.contacts.form', compact('users', 'academicRoles', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'academic_role' => 'required|integer|exists:academic_roles,id',
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'notes' => 'required|string',
        ]);

        try {

            $contact->update([
                'user_id' => $request->user_name,
                'academic_role_id' => $request->academic_role,
                'name' => $request->name,
                'organization' => $request->organization,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            notify()->success("Contact updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            notify()->success('Contact deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
