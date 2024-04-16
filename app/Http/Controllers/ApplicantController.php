<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function renderApplicantForm()
    {
        $job_id = session()->get('job_id');
        $job_name = session()->get('job_name');

        // Send data to view
        return view('applicant.applicant-form', ['job_id' => $job_id, 'job_name' => $job_name]);
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
