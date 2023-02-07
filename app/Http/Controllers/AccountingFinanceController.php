<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Item;
use Illuminate\Http\Request;

class AccountingFinanceController extends Controller
{
    public function advanceList(){
        return view('backend.accounting_finance.advance_list');
    }

    public function createAdvanceList(){
        $employees = Employee::all();
        return view('backend.accounting_finance.create_advance_list',compact('employees'));
    }

    public function advanceApproval(){
        return view('backend.accounting_finance.advance_approval');
    }

    public function billRequisitionList(){
        return view('backend.accounting_finance.bill_requisition_list');
    }

    public function createBillRequisitionList(){
        $employees = Employee::all();
        $items = Item::all();
        return view('backend.accounting_finance.create_bill_requisition_list',compact('employees','items'));
    }

    public function billRequisitionApproval(){
        return view('backend.accounting_finance.bill_requisition_approval');
    }

    public function summaryReport(){
        $employees = Employee::all();
        $departments = Department::all();
        return view('backend.accounting_finance.summary_report',compact('employees','departments'));
    }
}
