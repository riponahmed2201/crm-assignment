<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicRole;
use App\Models\FinancialTracker;
use App\Models\MeetingLog;
use App\Models\Notice;
use App\Models\ResearchProject;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
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

        $notices = Notice::where('status', 'published')
            ->where('published_at', '<=', Carbon::now())
            ->where('expires_at', '>=', Carbon::now())
            ->get();

        $data = [
            'taskCount' => $taskCount,
            'meetingLogCount' => $meetingLogCount,
            'financialTrackerCount' => $financialTrackerCount,
            'researchProjectsCount' => $researchProjectsCount,
            'notices' => $notices,
        ];

        return view('student.dashboard', $data);
    }
}
