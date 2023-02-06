<?php

namespace App\Http\Controllers;

use App\Models\AdvanceHistory;
use App\Models\Customer;
use App\Models\Requisition;
use App\Models\Site;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public function addAdvance(){
        $requisitions = Requisition::all();
        $customers = Customer::all();
        $sites = Site::all();
        return view('backend.advance.add-advance',compact('requisitions','customers','sites'));
    }

    public function saveAdvance(Request $request){

        $request->validate([
            'requisition_id' => 'required',
            'site_id' => 'required',
            'customer_id' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        $advance = new AdvanceHistory();
        $advance->requisition_id = $request->requisition_id;
        $advance->site_id = $request->site_id;
        $advance->customer_id = $request->customer_id;
        $advance->amount = $request->amount;
        $advance->description = $request->description;
        $advance->save();
        return back()->with('success', 'Advance Request Submitted');
    }

    public function advanceHistoryList(){
        $advance_lists = AdvanceHistory::all();
        return view('backend.advance.advance-list',compact('advance_lists'));
    }

    public function editAdvance($id){
        $advance = AdvanceHistory::where('id',$id)->first();
        $requisitions = Requisition::all();
        $customers = Customer::all();
        $sites = Site::all();
        return view('backend.advance.edit-advance',compact('advance','requisitions','customers','sites'));
    }

    public function updateAdvance(Request $request){
        $advance = AdvanceHistory::where('id',$request->id)->first();
        $request->validate([
            'requisition_id' => 'required',
            'site_id' => 'required',
            'customer_id' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        $advance->requisition_id = $request->requisition_id;
        $advance->site_id = $request->site_id;
        $advance->customer_id = $request->customer_id;
        $advance->amount = $request->amount;
        $advance->description = $request->description;
        $advance->save();
        return back()->with('success', 'Advance Request Updated');

    }

    public function deleteAdvance(Request $request){
        $advance = AdvanceHistory::where('id',$request->id)->first();
        $advance->delete();
        return back()->with('success', 'Advance Request Deleted');
    }
}
