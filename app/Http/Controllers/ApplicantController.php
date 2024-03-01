<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function renderApplicantForm()
    {
        return view('applicant.applicant-form');
    }
}
