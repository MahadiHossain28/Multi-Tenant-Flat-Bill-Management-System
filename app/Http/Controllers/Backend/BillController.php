<?php

namespace App\Http\Controllers\Backend;

use App\Enums\BillStatus;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillCategory;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Flat $flat)
    {
        $bills = Bill::with('category', 'creator')
            ->where('flat_id', $flat->id)
            ->orderByDesc('month')
            ->get()
            ->groupBy(function ($bill) {
                return Carbon::parse($bill->month)->format('Y-m');
            });
        return view('backend.bill.index', compact('bills', 'flat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Flat $flat)
    {
        $categories = BillCategory::select(['id', 'name'])->get();
        return view('backend.bill.create', compact('flat', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Flat $flat)
    {
        $request->validate([
            'category_id'   => 'required|array',
            'category_id.*' => 'exists:bill_categories,id',

            'amount'   => 'required|array',
            'amount.*' => 'required|numeric|min:0',

            'note'     => 'required|array',
            'note.*'   => 'nullable|string|max:255',
        ]);

        $month = Carbon::now()->startOfMonth()->format('Y-m-d');
        $lastMonth = Carbon::now()->subMonth();

        for($i = 0; $i < $request->category_count; $i++) {

            $lastBill = Bill::where('flat_id', $flat->id)
                ->where('category_id', $request->category_id[$i])
                ->whereYear('month', $lastMonth->year)
                ->whereMonth('month', $lastMonth->month)
                ->where('status', BillStatus::UNPAID)
                ->first();

            $previousDue = $lastBill?->due_amount ?? 0;

            $totalAmount = $request->amount[$i] + $previousDue;

            Bill::create([
                'building_id' => $flat->building_id,
                'flat_id'     => $flat->id,
                'category_id' => $request->category_id[$i],
                'month'       => $month,
                'amount'      => $totalAmount,
                'notes'       => $request->note[$i],
                'created_by'  => auth()->user()->id,
            ]);
        }

        return redirect()->route('flat.index')->with('success', 'Bill for this month created.');
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
    public function edit(Flat $flat, Bill $bill)
    {
        return view('backend.bill.edit', compact('bill', 'flat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flat $flat, Bill $bill)
    {
        $request->validate([
            'amount'   => 'required|numeric|min:0',
            'note'     => 'required|string|max:255',
        ]);

        $bill->update([
            'amount' => $request->amount,
            'notes' => $request->note,
        ]);
        return redirect()->route('bills.index', $flat->id)->with('success', 'Bill for this month updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
