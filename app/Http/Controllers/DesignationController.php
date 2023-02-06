<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('backend.designation.index', compact('designations'));
    }

    public function addDesignation()
    {
        return view('backend.designation.add-designation');
    }

    public function saveDesignation(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Designation::saveDesignation($request);
        return back()->with('success', 'Successfully Added');
    }

    public function editDesignation($id)
    {
        $designation = Designation::where('id', $id)->first();
        return view('backend.designation.edit-designation', compact('designation'));
    }

    public function updateDesignation(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Designation::updateDesignation($request);
        return redirect('designation')->with('success', 'Successfully Updated');
    }

    public function deleteDesignation(Request $request)
    {
        $designation = Designation::where('id', $request->designation_id)->first();
        $designation->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
