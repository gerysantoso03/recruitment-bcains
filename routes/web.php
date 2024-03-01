<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;
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
Route::get('/', function () {
    return view('home');
});
Route::get('/applicant-form', [ApplicantController::class, 'renderApplicantForm'])->name('applicant.form');

// Routes Authentication
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');
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
        Route::get('/admin-job/{id}', [JobController::class, 'renderJobDetailAdmin'])->name('job.detail.admin');
        Route::get('/admin-job/delete-job/{id}', [JobController::class, 'deleteJob'])->name('delete.job');
        Route::post('/admin-job/add-job', [JobController::class, 'createJob'])->name('add.job');
        Route::get('/admin-job/update-job-form/{id}', [JobController::class, 'renderUpdateJobForm'])->name('update.job.form');
        Route::post('/admin-job/update-job/{id}', [JobController::class, 'updateJob'])->name('update.job');
        //Route Branches
        Route::get('/admin-branch', [BranchController::class, 'renderAllBranches'])->name('branch');
        Route::get('/admin-branch/add-branch-form', [BranchController::class, 'renderBranchAddForm'])->name('add.branch.form');
        Route::post('/admin-branch/add-branch', [BranchController::class, 'createBranch'])->name('add.branch');
        Route::get('/admin-branch/update-branch-form/{id}', [BranchController::class, 'renderBranchUpdateForm'])->name('update.branch.form');
        Route::post('/admin-branch/update-branch/{id}', [BranchController::class, 'updateBranch'])->name('update.branch');
        Route::get('/admin-brach/delete-branch/{id}', [BranchController::class, 'deleteBranch'])->name('delete.branch');
        // Route Departments
        Route::get('/admin-department', [DepartmentController::class, 'renderAllDepartment'])->name('department');
        Route::get('/admin-department/add-department-form', [DepartmentController::class, 'renderDepartmentAddForm'])->name('add.department.form');
        Route::post('/admin-department/add-department', [DepartmentController::class, 'createDepartment'])->name('add.department');
        Route::get('/admin-department/update-department-form/{id}', [DepartmentController::class, 'renderDepartmentUpdateForm'])->name('update.department.form');
        Route::post('/admin-department/update-department/{id}', [DepartmentController::class, 'updateDepartment'])->name('update.department');
        Route::get('/admin-department/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete.department');
        // Route Divisions
        Route::get('/admin-division', [DivisionController::class, 'renderAllDivisions'])->name('division');
        Route::get('/admin-division/add-division-form', [DivisionController::class, 'renderDivisionAddForm'])->name('add.division.form');
        Route::post('/admin-division/add-division', [DivisionController::class, 'createDivision'])->name('add.division');
        Route::get('/admin-division/delete-division/{id}', [DivisionController::class, 'deleteDivision'])->name('delete.division');
        Route::get('/admin-division/update-division-form/{id}', [DivisionController::class, 'renderDivisionUpdateForm'])->name('update.division.form');
        Route::post('/admin-division/update-division/{id}', [DivisionController::class, 'updateDivision'])->name('update.division');
    });
});
