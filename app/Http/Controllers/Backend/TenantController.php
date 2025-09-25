<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\StoreRequest;
use App\Http\Requests\Tenant\UpdateRequest;
use App\Models\Building;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('flat:id,number', 'building:id,name')->paginate(10);
        return view('backend.tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::select(['id', 'name'])->get();
        return view('backend.tenant.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Tenant::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'assigned_building_id' => $request->building_id,
        ]);
        return redirect()->route('tenant.index')->with('success', 'Tenant has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        $buildings = Building::select(['id', 'name'])->get();
        return view('backend.tenant.edit', compact('tenant', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tenant $tenant)
    {
        if ($tenant->assigned_building_id !== $request->building_id) {
            $tenant->assigned_flat_id = null;
        }

        $tenant->update([
            'assigned_building_id' => $request->building_id,
            'assigned_flat_id'     => $tenant->assigned_flat_id, // either null or existing
            'name'                 => $request->name,
            'contact'              => $request->contact,
            'email'                => $request->email,
        ]);
        return redirect()->route('tenant.index')->with('success', 'Tenant has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenant.index')->with('success', 'Tenant has been deleted.');
    }
}
