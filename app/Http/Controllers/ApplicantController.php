<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function renderApplicantForm($id)
    {
        // Retrieve job detail with given id
        $job = Job::findOrFail($id);

        // Send data to view
        return view('applicant.applicant-form', compact('job'));
    }
}