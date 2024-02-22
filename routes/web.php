<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes View


// Routes Get
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');
Route::get('/', function () {
    return view('home');
});
// Routes Post
Route::post('/register-user', [AuthController::class, 'registerNewUser'])->name('register.user');
Route::post('/login-user', [AuthController::class, 'signInVerification'])->name('login.user');

// Route Group 
Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['isAdmin'])->group(function () {
        // Route Dashboards
        Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard');
        Route::get('/admin-applicant', [DashboardController::class, 'applicantPage'])->name('applicant');
        // Route Jobs
        Route::get('/admin-job', [JobController::class, 'renderAllJobs'])->name('job');
        Route::get('/admin-job/add-job-form', [JobController::class, 'renderAddJobForm'])->name('add.job.form');
        Route::get('/admin-job/update-job-form/{id}', [JobController::class, 'renderUpdateJobForm'])->name('update.job.form');
        Route::get('/admin-job/{id}', [JobController::class, 'renderJobDetailAdmin'])->name('job.detail.admin');
        Route::get('/admin-job/delete-job/{id}', [JobController::class, 'deleteJob'])->name('delete.job');
        Route::post('/admin-job/add-job', [JobController::class, 'createJob'])->name('add.job');
        // Route Departments
        Route::get('/admin-department', [DepartmentController::class, 'renderAllDepartment'])->name('department');
        Route::get('/admin-department/add-department-form', [DepartmentController::class, 'renderDepartmentAddForm'])->name('add.department.form');
        Route::post('/admin-department/add-department', [DepartmentController::class, 'createDepartment'])->name('add.department');
        Route::get('/admin-department/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete.department');
    });
});
