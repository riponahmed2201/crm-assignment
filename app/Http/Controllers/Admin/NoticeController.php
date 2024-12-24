<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::with('creator:id,name')->latest()->get();

        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.form');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:general,urgent,info',
            'priority'    => 'required|in:low,medium,high',
            'published_at' => 'nullable|date',
            'expires_at'  => 'nullable|date|after_or_equal:published_at',
            'status'      => 'required|in:draft,published,archived',
        ]);

        // Add created_by to validated data
        $validatedData['created_by'] = Auth::id();

        try {

            Notice::create($validatedData);

            notify()->success("Notice created successfully", "Success");

            return to_route('notices.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.form', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|in:general,urgent,info',
            'priority'    => 'required|in:low,medium,high',
            'published_at' => 'nullable|date',
            'expires_at'  => 'nullable|date|after_or_equal:published_at',
            'status'      => 'required|in:draft,published,archived',
        ]);

        // Add updated_by to validated data
        $validatedData['updated_by'] = Auth::id();

        try {
            // Update the notice
            $notice->update($validatedData);

            notify()->success("Notice updated successfully", "Success");

            return to_route('notices.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    public function destroy(Notice $notice)
    {
        try {
            $notice->delete();
            notify()->success('Notice deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
