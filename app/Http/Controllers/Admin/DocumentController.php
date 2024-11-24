<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('user')->latest()->get();

        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();

        return view('admin.documents.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'file_path' => 'required',
            'tags' => 'required|string',
        ]);

        $input = [
            'user_id' => $request->user,
            'title' => $request->title,
            'file_path' => $request->file_path,
            'tags' => $request->tags
        ];

        $filePath = $request->file('file_path');

        if ($filePath) {
            $filePathName = md5(Str::random(30) . time() . '_' . $request->file('file_path')) . '.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move('uploads/documents/', $filePathName);
            $input['file_path'] = $filePathName;
        }

        try {

            Document::create($input);

            notify()->success("Document created successfully", "Success");

            return to_route('documents.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $users = User::latest()->get();

        return view('admin.documents.form', compact('users', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'file_path' => 'nullable',
            'tags' => 'required|string',
        ]);

        $input = [
            'user_id' => $request->user,
            'title' => $request->title,
            'file_path' => $request->file_path,
            'tags' => $request->tags
        ];

        $filePath = $request->file('file_path');

        if ($filePath) {
            $filePathName = md5(Str::random(30) . time() . '_' . $request->file('file_path')) . '.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move('uploads/documents/', $filePathName);

            if (file_exists('uploads/documents/' . $document->file_path) && !empty($document->file_path)) {
                unlink('uploads/documents/' . $document->file_path);
            }

            $input['file_path'] = $filePathName;
        } else {
            $input['file_path'] = $document->file_path;
        }

        try {

            $document->update($input);

            notify()->success("Document updated successfully", "Success");

            return to_route('documents.index');
        } catch (Exception $exception) {

            dd($exception);
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        try {
            $document->delete();

            if (file_exists('uploads/documents/' . $document->file_path) && !empty($document->file_path)) {
                unlink('uploads/documents/' . $document->file_path);
            }

            notify()->success('Document deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
