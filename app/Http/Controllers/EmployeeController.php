<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function addEmployee(){
        return view('backend.admin.employee.add-employee');
    }

    public function index()
    {
        $employees = Employee::all();

        return view('backend.admin.employee.view-employee', compact('employees'));
    }

    public function saveEmployee(Request $request)
    {
        Employee::saveEmployee($request);
        return back();
    }

    public function deleteEmployee(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        $employee->delete();
        return back();
    }

    public function editEmployee($id)
    {
        return view('backend.admin.employee.edit-employee', [
            'employees' => Employee::find($id)
        ]);
    }

    public function updateEmployee(Request $request)
    {
        Employee::updateEmployee($request);
        return redirect(route('employee'));
    }
}
