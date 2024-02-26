<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function renderAllBranches()
    {
        $branches = Branch::paginate();

        return view('admin.branches.branch', compact('branches'));
    }

    public function renderBranchAddForm()
    {
        return view('admin.branches.add-new-branch');
    }

    public function renderBranchUpdateForm($id)
    {

        $branch = Branch::findOrFail($id);

        return view('admin.branches.update-branch', compact('branch'));
    }

    public function createBranch(Request $request)
    {
        // Validate request input
        $request->validate([
            'branch_name' => 'required',
            'branch_head' => 'required',
            'branch_location' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        // Create new department
        Branch::create([
            "branch_name" => $data['branch_name'],
            "branch_head" => $data['branch_head'],
            "branch_location" => $data['branch_location'],
        ]);

        return redirect('/admin-branch')->with('success', 'Successfully created new branch!!');
    }

    public function updateBranch(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        // Validate request input
        $request->validate([
            'branch_name' => 'required',
            'branch_head' => 'required',
            'branch_location' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        $branch->update([
            "branch_name" => $data['branch_name'],
            "branch_head" => $data['branch_head'],
            "branch_location" => $data['branch_location'],
        ]);

        return redirect('/admin-branch')->with('success', 'Successfully update branch!!');
    }

    public function deleteBranch($id)
    {
        // Obtained department with selected id 
        $branch = Branch::findOrFail($id);

        if ($branch) {
            // Delete selected department from database
            $branch->delete();
            return redirect('/admin-branch')->with('success', 'Successfully delete branch!!');
        }

        return redirect('/admin-branch')->with('failed', 'Branch is not exists!!');
    }
}
