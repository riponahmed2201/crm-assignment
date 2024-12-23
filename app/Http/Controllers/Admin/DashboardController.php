<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use App\Models\FinancialTracker;
use App\Models\MeetingLog;
use App\Models\ResearchProject;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $taskCount = Task::count();
        $academicRoleCount = AcademicRole::count();
        $userCount = User::count();
        $researchProjectsCount = ResearchProject::count();

        return view('admin.dashboard', compact('taskCount', 'academicRoleCount', 'userCount', 'researchProjectsCount'));
    }

    public function studentDashboard()
    {
        $taskCount = Task::where('user_id', Auth::id())->count();
        $meetingLogCount = MeetingLog::where('user_id', Auth::id())->count();
        $financialTrackerCount = FinancialTracker::where('user_id', Auth::id())->count();
        $researchProjectsCount = ResearchProject::where('user_id', Auth::id())->count();

        return view('student.dashboard', compact('taskCount', 'meetingLogCount', 'financialTrackerCount', 'researchProjectsCount'));
    }
}
