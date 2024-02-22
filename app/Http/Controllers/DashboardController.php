<?php

namespace App\Http\Controllers;

use App\Models\Job;

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
}
