<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function renderAllDivisions()
    {
        // Get all divisions
        $divisions = Division::paginate();

        return view('admin.divisions.division', compact('divisions'));
    }

    public function renderDivisionAddForm()
    {
        return view('admin.divisions.add-new-division');
    }

    public function renderDivisionUpdateForm($id)
    {
        // Get selected division data
        $division = Division::findOrFail($id);

        return view('admin.divisions.update-division', compact('division'));
    }


    public function createDivision(Request $request)
    {
        // Validate request input
        $request->validate([
            'division_name' => 'required',
            'division_head' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        // Create new division
        Division::create([
            "division_name" => $data['division_name'],
            "division_head" => $data['division_head'],
        ]);

        return redirect('/admin-division')->with('success', 'Successfully created new division!!');
    }

    public function updateDivision(Request $request, $id)
    {
        $division = Division::findOrFail($id);

        // Validate request input
        $request->validate([
            'division_name' => 'required',
            'division_head' => 'required',
        ]);

        // Get request input
        $data = $request->all();

        $division->update([
            "division_name" => $data['division_name'],
            "division_head" => $data['division_head'],
        ]);

        return redirect('/admin-division')->with('success', 'Successfully update division!!');
    }

    public function deleteDivision($id)
    {
        // Obtained division with selected id 
        $division = Division::findOrFail($id);

        if ($division) {
            // Delete selected job from database
            $division->delete();
            return redirect('/admin-division')->with('success', 'Successfully delete division!!');
        }

        return redirect('/admin-division')->with('failed', 'Division is not exists!!');
    }
}
