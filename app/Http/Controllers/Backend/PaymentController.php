<?php

namespace App\Http\Controllers\Backend;

use App\Enums\BillStatus;
use App\Http\Controllers\Controller;
use App\Mail\BillCreated;
use App\Mail\BillPaid;
use App\Models\Bill;
use App\Models\Flat;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Flat $flat)
    {
        $now = Carbon::now();

        $bills = Bill::with('category:id,name')
            ->whereYear('month', $now->year)
            ->whereMonth('month', $now->month)
            ->where('flat_id', $flat->id)
            ->where('status', BillStatus::UNPAID)
            ->get();
        return view('backend.layouts.payment.create', compact('bills', 'flat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Flat $flat)
    {
        $request->validate([
            'bill_id'   => 'required|array',
            'bill_id.*' => 'exists:bills,id',

            'amount'   => 'required|array',
            'amount.*' => 'required|numeric|min:0',
        ]);

        $today = Carbon::now();

        for($i = 0; $i < $request->bill_count; $i++) {
            $bill = Bill::find($request->bill_id[$i]);

            Payment::create([
                'bill_id' => $request->bill_id[$i],
                'paid_by_tenant_id' => $flat->tenant->id,
                'amount' => $request->amount[$i],
                'paid_at' => $today,
                'payment_method' => 'cash'
            ]);

            if($bill->amount <= $request->amount[$i]){
                $bill->update([
                    'status' => BillStatus::PAID
                ]);
            }
        }

        $month = Carbon::now()->startOfMonth();

        $currentMonthBills = Bill::where('flat_id', $flat->id)
            ->whereYear('month', $month->year)
            ->whereMonth('month', $month->month)
            ->get();

        Mail::to($flat->owner_email)->send(new BillPaid($flat, $currentMonthBills));
        Mail::to($flat->tenant->email)->send(new BillPaid($flat, $currentMonthBills));

        return redirect()->route('bills.index', $flat->id)->with('success', 'Bill Paid for this month.');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
