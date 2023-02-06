<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('backend.department.index',compact('departments'));
    }

    public function addDepartment()
    {
        return view('backend.department.add-department');
    }

    public function saveDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Department::saveDepartment($request);
        return back()->with('success', 'Successfully Added');
    }

    public function editDepartment($id){
        $department = Department::where('id',$id)->first();
        return view('backend.department.edit-department',compact('department'));
    }

    public function updateDepartment(Request $request){
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Department::updateDepartment($request);
        return redirect('department')->with('success', 'Successfully Updated');
    }

    public function deleteDepartment(Request $request){
        $department = Department::where('id',$request->department_id)->first();
        $department->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
