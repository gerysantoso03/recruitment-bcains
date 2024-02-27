<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Division;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Get all jobs data
    public function renderAllJobs()
    {
        // Get all jobs belongs to each department obtained
        $jobs = Job::with(['department', 'branch', 'department.division'])->get();

        // Return view with all jobs available
        return view('admin.jobs.job', compact('jobs'));
    }

    public function renderJobDetailAdmin($id)
    {
        // Retrieve job detail with given id
        $job = Job::findOrFail($id);

        if ($job) {
            return view('admin.jobs.job-detail', compact('job'));
        }

        return redirect()->back()->with('Failed', "Job is not exists!!");
    }

    public function renderAddJobForm()
    {
        // Retrieve all departments 
        $departments = Department::with('division')->get();

        // Retrieve all branchs
        $branchs = Branch::all();

        return view('admin.jobs.add-new-job', compact('departments', 'branchs'));
    }

    public function renderUpdateJobForm($id)
    {
        // Retrieve all departments 
        $departments = Department::all();

        // Retrieve all branches
        $branchs = Branch::all();

        $job = Job::findOrFail($id);

        return view('admin.jobs.update-job', compact('departments', 'branchs', 'job'));
    }

    // Create new job 
    public function createJob(request $request)
    {
        // Validate request input
        $request->validate([
            'position_name' => 'required',
            'end_date' => 'required|date|after_or_equal:now',
            'employment_type' => 'required',
            'qualifications' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        // Create new job
        Job::create([
            "position_name" => $data['position_name'],
            "end_date" => $data['end_date'],
            "employment_type" => $data['employment_type'],
            "qualifications" => $data['qualifications'],
            "branch_id" => $data['branch_id'],
            "department_id" => $data['department_id'],
        ]);

        return redirect('/admin-job')->with('success', 'Successfully created new job!!');
    }

    public function updateJob(Request $request, $id)
    {
        // Validate request input
        $request->validate([
            'position_name' => 'required',
            'end_date' => 'required|date|after_or_equal:now',
            'employment_type' => 'required',
            'qualifications' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        // Get selected job 
        $job = Job::findOrFail($id);

        $job->update([
            'position_name' => $data['position_name'],
            'end_date' => $data['end_date'],
            'employment_type' => $data['employment_type'],
            'qualifications' => $data['qualifications'],
            'branch_id' => $data['branch_id'],
            'department_id' => $data['department_id']
        ]);

        return redirect('/admin-job')->with('success', 'Successfully update job!!');
    }

    public function deleteJob($id)
    {
        // Obtained job with selected id 
        $job = Job::findOrFail($id);

        if ($job) {
            // Delete selected job from database
            $job->delete();
            return redirect('/admin-job')->with('success', 'Successfully delete job!!');
        }

        return redirect('/admin-job')->with('failed', 'Job is not exists!!');
    }
}
