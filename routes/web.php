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
use App\Http\Controllers\Admin\NetworkingLogController;
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
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('password/update', [AuthController::class, 'updatePassword'])->name('password.update');

    //Resources routes
    Route::resources([
        'users' => UserController::class,
        'academic-roles' => AcademicRoleController::class,
        'calendar-events' => CalendarEventController::class,
        'contacts' => ContactController::class,
        'custom-notes' => CustomNoteController::class,
        'documents' => DocumentController::class,
        'financial-categories' => FinancialCategoryController::class,
        'financial-trackers' => FinancialTrackerController::class,
        'networking-logs' => NetworkingLogController::class,
        'performances' => PerformanceController::class,
        'research-projects' => ResearchProjectController::class,
        'task-categories' => TaskCategoryController::class,
        'tasks' => TaskController::class,
    ]);
});
