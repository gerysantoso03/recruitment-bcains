<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
        // Route Get Admin
        Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard');
        Route::get('/admin-applicant', [DashboardController::class, 'applicantPage'])->name('applicant');
        // Route Jobs
        Route::get('/admin-job', [DashboardController::class, 'jobPage'])->name('job');
        Route::get('/admin-job/add-job-form', [JobController::class, 'renderAddJobForm'])->name('add.job.form');
        Route::get('/admin-job/update-job-form/{id}', [JobController::class, 'renderUpdateJobForm'])->name('update.job.form');
        Route::get('/admin-job/{id}', [JobController::class, 'renderJobDetailAdmin'])->name('job.detail.admin');
        Route::get('/admin-job/delete-job/{id}', [JobController::class, 'deleteJob'])->name('delete.job');
        // Route Post Admin
        Route::post('/admin-job/add-job', [JobController::class, 'createJob'])->name('add.job');
    });
});
