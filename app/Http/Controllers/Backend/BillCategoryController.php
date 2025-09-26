<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillCategoryRequest;
use App\Models\BillCategory;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billCategories = BillCategory::with('building')->paginate(10);
        return view('backend.layouts.bill_category.index', compact('billCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            $buildings = Building::select(['id', 'name'])->get();
        }else{
            $buildings = null;
        }
        return view('backend.layouts.bill_category.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BillCategoryRequest $request)
    {
        BillCategory::create([
            'building_id' => $request->building_id,
            'name' => $request->name,
        ]);

        return redirect()->route('bill-category.index')->with('success', 'Bill Category has been created.');
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
    public function edit(BillCategory $billCategory)
    {
        if(Auth::user()->hasRole('admin')){
            $buildings = Building::select(['id', 'name'])->get();
        }else{
            $buildings = null;
        }
        return view('backend.layouts.bill_category.edit', compact('billCategory', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BillCategoryRequest $request, BillCategory $billCategory)
    {
        $billCategory->update([
            'building_id' => $request->building_id,
            'name' => $request->name,
        ]);
        return redirect()->route('bill-category.index')->with('success', 'Bill Category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillCategory $billCategory)
    {
        $billCategory->delete();
        return redirect()->route('bill-category.index')->with('success', 'Bill Category has been deleted.');
    }
}
