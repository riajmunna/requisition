<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    public function addEmployee()
    {
        $department = Department::all();
        $designation = Designation::all();
        return view('backend.employee.add-employee', compact('department','designation'));
    }

    public function saveEmployee(Request $request)
    {
        Employee::saveEmployee($request);
        return back()->with('success', 'Successfully Added');
    }

    public function deleteEmployee(Request $request)
    {
        $employee = User::where('id', $request->employee_id)->first();
        $employee->delete();

        $employee = Employee::where('user_id', $request->employee_id)->first();
        $employee->delete();
        return back();
    }

    public function editEmployee($id)
    {
        return view('backend.employee.edit-employee', [
            'employees' => Employee::find($id),
            'department' => Department::find($id),
            'designation' => Designation::find($id),
        ]);
    }

    public function updateEmployee(Request $request)
    {
        Employee::updateEmployee($request);
        return redirect(route('employee'));
    }

}
