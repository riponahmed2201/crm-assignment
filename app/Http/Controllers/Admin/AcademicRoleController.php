<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use Exception;
use Illuminate\Http\Request;

class AcademicRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicRoles = AcademicRole::latest()->get();

        return view('admin.academic-roles.index', compact('academicRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academic-roles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:academic_roles',
            'description' => 'required|string',
        ]);

        try {

            AcademicRole::create($request->all());

            notify()->success("Academic role created successfully", "Success");

            return to_route('academic-roles.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicRole $academicRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicRole $academicRole)
    {
        return view('admin.academic-roles.form', compact('academicRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicRole $academicRole)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:academic_roles,role_name,' . $academicRole->id,
            'description' => 'required|string',
        ]);

        try {

            $academicRole->update($request->all());

            notify()->success("Academic role created successfully", "Success");

            return to_route('academic-roles.index');
        } catch (Exception $exception) {
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicRole $academicRole)
    {
        try {
            $academicRole->delete();
            notify()->success('Academic role deleted successfull.', 'Success');
            return back();
        } catch (Exception $exception) {
            dd($exception);
            notify()->success("Something error found! Please try again", "Error");
            return back();
        }
    }
}
