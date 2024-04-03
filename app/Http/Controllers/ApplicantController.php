<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function renderApplicantForm()
    {
        return view('applicant.applicant-form');
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
