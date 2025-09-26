@extends('master')

@section('content')
    <x-admin.body title="Add Payment For {{ $flat->number }}" :route="route('bills.index', $flat->id)">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('payment.store', $flat->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="bill_count" value="{{ $bills->count() }}">
                    @forelse($bills as $index => $bill)
                        <div class="row m-0 align-items-center  border mb-2 p-1">
                            <div class="col-6 text-end">
                                <input type="hidden" name="bill_id[{{ $index }}]" value="{{ $bill->id }}">
                                <h5>{{ $bill->category->name }} ( {{ $bill->due_amount }} ) :</h5>
                            </div>
                            <div class="col-6">
                                <x-form.input label="Paid Amount" type="text" id="amount_{{ $index }}" name="amount[{{ $index }}]" placeholder="Enter Paid Amount"/>
                            </div>
                        </div>
                    @empty
                        <div class="text-center mb-3">No Bill Added For This Month</div>
                    @endforelse
                    @if($bills->count() > 0)
                    <x-form.submit-btns class="text-center" :route-name="route('bills.index', $flat->id)">Add</x-form.submit-btns>
                    @endif
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
