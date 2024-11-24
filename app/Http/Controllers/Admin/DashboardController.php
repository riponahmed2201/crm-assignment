<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $taskCount = Task::count();
        $academicRoleCount = AcademicRole::count();
        $userCount = User::count();
        $researchProjectsCount = AcademicRole::count();

        return view('admin.dashboard', compact('taskCount', 'academicRoleCount', 'userCount', 'researchProjectsCount'));
    }
}
