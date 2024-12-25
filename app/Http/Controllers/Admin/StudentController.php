<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'batch' => 'required|string|max:50',
            'program' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('profile_picture')) {
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $filePath;
        }

        $validatedData['created_by'] = Auth::id();

        DB::beginTransaction();
        try {

            Student::create($validatedData);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 'student',
                'password' => Hash::make('password'),
            ]);

            DB::commit();
            notify()->success("Student created successfully", "Success");
            return to_route('students.index');
        } catch (Exception $exception) {
            DB::rollBack();
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    public function edit(Student $student)
    {
        return view('admin.students.form', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $record = Student::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $record->id,
            'phone' => 'required|string|max:15',
            'department' => 'required|string|max:255',
            'batch' => 'required|string|max:50',
            'program' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id,' . $record->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if exists
            if ($record->profile_picture && Storage::disk('public')->exists($record->profile_picture)) {
                Storage::disk('public')->delete($record->profile_picture);
            }

            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $filePath;
        }

        $validatedData['updated_by'] = Auth::id();

        DB::beginTransaction();
        try {

            $record->update($validatedData);

            User::updateOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]
            );

            DB::commit();
            notify()->success("Student updated successfully", "Success");
            return to_route('students.index');
        } catch (Exception $exception) {
            DB::rollBack();
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    public function destroy(Student $student)
    {
        DB::beginTransaction();
        try {
            // Delete the user associated with the student's email
            User::where('email', '=', $student->email)->delete();

            // Delete the student record
            $student->delete();

            // Commit the transaction
            DB::commit();

            // Notify the user of success
            notify()->success('Student deleted successfully.', 'Success');
            return back();
        } catch (Exception $exception) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Notify the user of the error
            notify()->error('Something went wrong! Please try again.', 'Error');
            return back();
        }
    }
}
