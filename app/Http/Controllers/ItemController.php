<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('backend.item.index', compact('items'));
    }

    public function addItem()
    {
        $customers = Customer::all();
        return view('backend.item.add-item', compact('customers'));
    }

    public function saveItem(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
        ]);

        Item::saveItem($request);
        return back()->with('success', 'Successfully Added');
    }

    public function editItem($id)
    {
        $item = Item::where('id', $id)->first();
        $customers = Customer::all();
        return view('backend.item.edit-item', compact('item','customers'));
    }

    public function updateItem(Request $request)
    {
//        $item = Item::where('id', $request->item_id)->first();
//        return $request;

        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
        ]);

        Item::updateItem($request);
        return redirect('item')->with('success', 'Successfully Updated');
    }

    public function deleteItem(Request $request)
    {
        $item = Item::where('id', $request->item_id)->first();
        $item->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
