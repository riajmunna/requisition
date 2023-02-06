<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('backend.customer.index',compact('customers'));
    }

    public function addCustomer()
    {
        return view('backend.customer.add-customer');
    }

    public function saveCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        Customer::saveCustomer($request);
        return back()->with('success', 'Successfully Added');
    }

    public function editCustomer($id){
        $customer = Customer::where('id',$id)->first();
        return view('backend.customer.edit-customer',compact('customer'));
    }

    public function updateCustomer(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        Customer::updateCustomer($request);
        return redirect('customer')->with('success', 'Successfully Updated');
    }

    public function deleteCustomer(Request $request){
        $customer = Customer::where('id',$request->customer_id)->first();
        $customer->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
