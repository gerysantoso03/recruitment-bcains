<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Return department page
    public function renderAllDepartment()
    {
        // Get all departments
        $departments = Department::paginate();

        return view('admin.departments.department', compact('departments'));
    }

    public function renderDepartmentAddForm()
    {
        // Get all divisions
        $divisions = Division::all();

        return view('admin.departments.add-new-department', compact('divisions'));
    }

    public function renderDepartmentUpdateForm($id)
    {
        // Get all divisions
        $divisions = Division::all();

        $department = Department::findOrFail($id);

        return view('admin.departments.update-department', compact('divisions', 'department'));
    }

    public function createDepartment(Request $request)
    {
        // Validate request input
        $request->validate([
            'department_name' => 'required',
            'department_head' => 'required',
            'division_id' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        // Create new department
        Department::create([
            "department_name" => $data['department_name'],
            "department_head" => $data['department_head'],
            "division_id" => $data['division_id'],
        ]);

        return redirect('/admin-department')->with('success', 'Successfully created new department!!');
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        // Validate request input
        $request->validate([
            'department_name' => 'required',
            'department_head' => 'required',
            'division_id' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        $department->update([
            "department_name" => $data['department_name'],
            "department_head" => $data['department_head'],
            "division_id" => $data['division_id'],
        ]);

        return redirect('/admin-department')->with('success', 'Successfully update department!!');
    }

    public function deleteDepartment($id)
    {
        // Obtained department with selected id 
        $department = Department::findOrFail($id);

        if ($department) {
            // Delete selected department from database
            $department->delete();
            return redirect('/admin-department')->with('success', 'Successfully delete department!!');
        }

        return redirect('/admin-department')->with('failed', 'Department is not exists!!');
    }
}
