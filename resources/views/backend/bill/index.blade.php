@extends('master')

@section('content')
    <x-admin.body title="Flat Bill List For {{ $flat->number }}" :route="route('flat.index')">
        <x-slot:actions>
            @if($flat->hasBillForMonth())
                <a href="{{ route('payment.create', $flat->id) }}" class="btn btn-dark btn-sm">Add Payment</a>
            @endif
        </x-slot:actions>

        @forelse($bills as $month => $monthBills)
            <h5>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</h5>

            <x-table :headers="['#', 'Action', 'Category', 'Status', 'Total', 'Paid', 'Due']">
                @foreach($monthBills as $key=>$bill)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td style="width: 20%">
                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                <a href="{{ route('bills.edit', [$flat->id,$bill->id]) }}" class="btn btn-dark btn-sm">Edit Bill</a>
                            </div>
                        </td>
                        <td>{{ $bill->category->name }}</td>
                        <td>
                            <div class="{{ $bill->status->color() }}">
                                {{ $bill->status->label() }}
                            </div>
                        </td>
                        <td class="text-end">{{ $bill->amount }}</td>
                        <td class="text-end">{{ number_format($bill->paid_total,2) }}</td>
                        <td class="text-end">{{ number_format($bill->due_amount,2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end fw-bold">Grand Total</td>
                    <td class="fw-bold text-end">{{ number_format($monthBills->sum('amount'), 2) }}</td>
                    <td class="fw-bold text-end">{{ number_format($monthBills->sum('paid_total'), 2) }}</td>
                    <td class="fw-bold text-end">{{ number_format($monthBills->sum('due_amount'), 2) }}</td>
                </tr>
            </x-table>

        @empty
            <div class="text-center">No data found.</div>
        @endforelse
    </x-admin.body>
@endsection
