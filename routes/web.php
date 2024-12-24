<?php

use App\Http\Controllers\Admin\AcademicRoleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CalendarEventController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomNoteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FinancialCategoryController;
use App\Http\Controllers\Admin\FinancialTrackerController;
use App\Http\Controllers\Admin\MeetingLogController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PerformanceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ResearchProjectController;
use App\Http\Controllers\Admin\TaskCategoryController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('login');

//Admin Route Here
Route::group(['middleware' => ['admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Resources routes
    Route::resources([
        'users' => UserController::class,
        'academic-roles' => AcademicRoleController::class,
        'contacts' => ContactController::class,
        'financial-categories' => FinancialCategoryController::class,
        'task-categories' => TaskCategoryController::class
    ]);
});

//This Route access student
Route::group(['middleware' => 'student'], function () {
    Route::get('student-dashboard', [DashboardController::class, 'studentDashboard'])->name('student.dashboard');
});

//This Route access both admin and student
Route::group(['middleware' => ['user']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('password/update', [AuthController::class, 'updatePassword'])->name('password.update');

    //Resources routes
    Route::resources([
        'calendar-events' => CalendarEventController::class,
        'custom-notes' => CustomNoteController::class,
        'documents' => DocumentController::class,
        'financial-trackers' => FinancialTrackerController::class,
        'meeting-logs' => MeetingLogController::class,
        'performances' => PerformanceController::class,
        'research-projects' => ResearchProjectController::class,
        'tasks' => TaskController::class,
        'notices' => NoticeController::class,
    ]);
});
