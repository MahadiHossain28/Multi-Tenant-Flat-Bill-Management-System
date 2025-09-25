<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseOwner\StoreRequest;
use App\Http\Requests\HouseOwner\UpdateRequest;
use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HouseOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houseOwners = User::with('building')->role('house_owner')->paginate(10);
        return view('backend.houseowner.index', compact('houseOwners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::all();
        return view('backend.houseowner.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $houseOwner = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('password'),
        ])->assignRole('house_owner');

        Building::create([
            'house_owner_id' => $houseOwner->id,
            'name' => $request->building_name,
            'address' => $request->building_address,
        ]);

        return redirect()->route('owner.index')->with('success', 'House Owner has been created.');
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
    public function edit(User $owner)
    {
        return view('backend.houseowner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $owner)
    {
        $owner->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $owner->building()->update([
            'name' => $request->building_name,
            'address' => $request->building_address,
        ]);

        return redirect()->route('owner.index')->with('success', 'House Owner has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $owner)
    {
        $owner->delete();
        return redirect()->route('owner.index')->with('success', 'House Owner has been deleted.');
    }
}
