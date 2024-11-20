<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'role' => 'required|string|in:admin,user',
            'password' => 'required|string|min:6'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        try {

            User::create($input);

            notify()->success("User created successfully", "Success");

            return to_route('users.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'role' => 'required|string|in:admin,user',
            'password' => 'required|string|min:6'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        try {

            $user->update($input);

            notify()->success("User updated successfully", "Success", "topRight");

            return back();
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd($user);

        try {
            if ($user->deletable) {
                $user->delete();
                notify()->success('User deleted successfull.', 'Success');
                return back();
            } else {
                notify()->error("You can\'t delete system user", "Error");
                return back();
            }
        } catch (Exception $exception) {
            dd($exception);
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
