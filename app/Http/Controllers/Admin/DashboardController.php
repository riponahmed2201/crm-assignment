<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $taskCount = Task::count();
        $academicRoleCount = AcademicRole::count();
        $userCount = User::count();
        $researchProjectsCount = AcademicRole::count();

        return view('admin.dashboard', compact('taskCount', 'academicRoleCount', 'userCount', 'researchProjectsCount'));
    }

    public function studentDashboard()
    {
        $taskCount = Task::count();
        $academicRoleCount = AcademicRole::count();
        $userCount = User::count();
        $researchProjectsCount = AcademicRole::count();

        return view('student.dashboard', compact('taskCount', 'academicRoleCount', 'userCount', 'researchProjectsCount'));
    }
}
