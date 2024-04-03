<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
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

    public function renderApplicantDetail($id)
    {
        // Retrieve applicant detail with given id
        $applicant = Applicant::findOrFail($id);

        if ($applicant) {
            return view('admin.applicants.applicant-detail', compact('applicant'));
        }

        return redirect()->back()->with('Failed', "Applicant is not exists!!");
    }
}
