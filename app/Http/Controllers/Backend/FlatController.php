<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flat\StoreRequest;
use App\Http\Requests\Flat\UpdateRequest;
use App\Http\Requests\FlatRequest;
use App\Models\Building;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flats = Flat::with('building')->get();
        return view('backend.flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            $buildings = Building::all();
        }else{
            $buildings = null;
        }
        return view('backend.flats.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Flat::create([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'owner_contact' => $request->owner_contact,
            'owner_email' => $request->owner_email,
        ]);
        return redirect()->route('flat.index')->with('success', 'Flat added successfully.');
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
    public function edit(Flat $flat)
    {
        if(Auth::user()->hasRole('admin')){
            $buildings = Building::all();
        }else{
            $buildings = null;
        }
        return view('backend.flats.edit', compact('buildings', 'flat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Flat $flat)
    {
        $flat->update([
            'building_id' => $request->building_id,
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'owner_contact' => $request->owner_contact,
            'owner_email' => $request->owner_email,
        ]);
        return redirect()->route('flat.index')->with('success', 'Flat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flat $flat)
    {
        $flat->delete();
        return redirect()->route('flat.index')->with('success', 'Flat deleted successfully.');
    }
}
