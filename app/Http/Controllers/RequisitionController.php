<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    public function addRequisition(){
        return view('backend.requisition.add-requisition');
    }

    public function saveRequisition(Request $request){
        $request->validate([
            'total_amount' => 'required',
        ]);
        $requisition = new Requisition();
        $requisition->requester = Auth::user()->id;
        $requisition->total_amount = $request->total_amount;
        $requisition->save();
        return back()->with('success', 'Requisition Submitted');
    }
}
