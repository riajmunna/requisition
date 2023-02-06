<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    public function index()
    {
        $requisitions = Requisition::all();
        return view('backend.requisition.index', compact('requisitions'));
    }

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

    public function editRequisition($id)
    {
        $requisition = Requisition::where('id', $id)->first();
        return view('backend.requisition.edit-requisition', compact('requisition'));
    }

    public function updateRequisition(Request $request)
    {
        $request->validate([
            'total_amount' => 'required',
        ]);

        Requisition::updateRequisition($request);
        return redirect('requisition')->with('success', 'Successfully Updated');
    }

    public function deleteRequisition(Request $request)
    {
        $requisition = Requisition::where('id', $request->requisition_id)->first();
        $requisition->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
