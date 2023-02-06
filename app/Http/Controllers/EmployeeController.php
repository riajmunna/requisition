<?php

namespace App\Http\Controllers;

use App\Models\AdvanceHistory;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Requisition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    public function addEmployee(){
        $departments = Department::all();
        $designations = Designation::all();
        return view('backend.employee.add-employee',compact('departments','designations'));
    }

    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    public function saveEmployee(Request $request)
    {
        Employee::saveEmployee($request);
        return back()->with('success', 'Successfully Added');
    }

    public function deleteEmployee(Request $request)
    {
        $employee = User::where('id',$request->employee_id)->first();
        $employee->delete();

        $employee = Employee::where('user_id',$request->employee_id)->first();
        $employee->delete();
        return back();
    }

    public function editEmployee($id)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $employees = Employee::where('id',$id)->first();
        return view('backend.employee.edit-employee',compact('designations','departments','employees'));
    }

    public function updateEmployee(Request $request)
    {
        Employee::updateEmployee($request);
        return redirect(route('employee'));
    }


}
