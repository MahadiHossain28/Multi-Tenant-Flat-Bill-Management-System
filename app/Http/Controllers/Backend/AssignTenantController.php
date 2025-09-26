<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AssignTenantController extends Controller
{
    public function index(Flat $flat)
    {
        $tenants = Tenant::where('assigned_building_id', $flat->building_id)->whereNull('assigned_flat_id')->select(['id', 'name'])->get();
        return view('backend.layouts.tenant.assign.index', compact('tenants', 'flat'));
    }

    public function store(Request $request, Flat $flat)
    {
        $request->validate([
            'tenant_id' => 'required',
        ]);
        Tenant::findOrFail($request->tenant_id)->update(['assigned_flat_id' => $flat->id]);

        return redirect()->route('flat.index')->with('success', 'Tenant Assigned.');
    }

    public function remove(Tenant $tenant)
    {
        $tenant->update(['assigned_flat_id' => null]);
        return redirect()->route('flat.index')->with('success', 'Tenant Removed.');
    }
}
