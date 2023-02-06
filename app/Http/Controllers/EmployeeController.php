<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function addEmployee(){
        return view('backend.employee.add-employee');
    }

    public function index()
    {
        $employees = Employee::all();

        return view('backend.employee.view-employee', compact('employees'));
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
        return view('backend.employee.edit-employee', [
            'employees' => Employee::find($id)
        ]);
    }

    public function updateEmployee(Request $request)
    {
        Employee::updateEmployee($request);
        return redirect(route('employee'));
    }

}
