<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomNote;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CustomNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customNotes = CustomNote::with('user')->latest()->get();

        return view('admin.custom-notes.index', compact('customNotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();

        return view('admin.custom-notes.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string',
        ]);

        try {

            CustomNote::create([
                'user_id' => $request->user_name,
                'title' => $request->title,
                'content' => $request->content,
                'tags' => $request->tags
            ]);

            notify()->success("Custom note created successfully", "Success");

            return to_route('custom-notes.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomNote $customNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomNote $customNote)
    {
        $users = User::latest()->get();

        return view('admin.custom-notes.form', compact('users', 'customNote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomNote $customNote)
    {
        $request->validate([
            'user_name' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string',
        ]);

        try {

            $customNote->update([
                'user_id' => $request->user_name,
                'title' => $request->title,
                'content' => $request->content,
                'tags' => $request->tags
            ]);

            notify()->success("Custom note updated successfully", "Success");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomNote $customNote)
    {
        try {
            $customNote->delete();
            notify()->success('Custom note deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
