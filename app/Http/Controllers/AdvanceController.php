<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public function index()
    {
        $data=Advance::all();
        return view('backend.accounting_finance.advance_list',compact('data'));
    }
    public function create()
    {
        $employees = Employee::all();
        return view('backend.accounting_finance.create_advance_list',compact('employees'));
    }
}
