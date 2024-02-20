<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Solutions\MakeViewVariableOptionalSolution;

class DashboardController extends Controller
{
    public function dashboardPage()
    {
        return view('admin.dashboard');
    }

    public function applicantPage()
    {
        return view('admin.applicant');
    }

    // Get all jobs data
    public function jobPage()
    {
        // Get all jobs belongs to each department obtained
        $jobs = Job::with(['department', 'branch', 'department.division'])->get();

        // Return view with all jobs available
        return view('admin.job', compact('jobs'));
    }
}
