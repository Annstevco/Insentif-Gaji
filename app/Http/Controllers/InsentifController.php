<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division; // Assuming you have a Division model

class InsentifController extends Controller
{
    public function showDivisions()
    {
        $divisions = Division::all(); // Fetch all divisions
        return view('kelolainsentif', compact('divisions'));
    }

    // Create a new division
    public function create(Request $request)
    {
        $division = new Division();
        $division->name = $request->input('division_name');
        $division->incentive = $request->input('incentive');
        $division->save();

        return redirect()->back()->with('success', 'Division created successfully.');
    }

    // Update an existing division
    public function update(Request $request, $id)
    {
        $incentiveInput = $request->input('incentive');

        // Remove non-numeric characters
        $incentive = preg_replace('/[^0-9.]/', '', $incentiveInput);

        $division = Division::findOrFail($id);
        $division->incentive = $incentive;
        $division->save();

        return redirect()->back()->with('success', 'Division updated successfully.');
    }


    // Delete a division
    public function delete($id)
    {
        $division = Division::findOrFail($id);
        $division->delete();

        return redirect()->back()->with('success', 'Division deleted successfully.');
    }
}
