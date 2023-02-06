<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::all();
        return view('backend.site.index', compact('sites'));
    }

    public function addSite()
    {
        $customers = Customer::all();
        return view('backend.site.add-site', compact('customers'));
    }

    public function saveSite(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Site::saveSite($request);
        return back()->with('success', 'Successfully Added');
    }

    public function editSite($id)
    {
        $site = Site::where('id', $id)->first();
        $customers = Customer::all();
        return view('backend.site.edit-site', compact('site','customers'));
    }

    public function updateSite(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Site::updateSite($request);
        return redirect('site')->with('success', 'Successfully Updated');
    }

    public function deleteSite(Request $request)
    {
        $site = Site::where('id', $request->site_id)->first();
        $site->delete();
        return back()->with('success', "Successfully Deleted");
    }
}
