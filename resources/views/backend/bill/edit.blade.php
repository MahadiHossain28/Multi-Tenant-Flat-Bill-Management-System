@extends('master')

@section('content')
    <x-admin.body title="Edit Bill For {{ $flat->number }}" :route="route('bills.index', $flat->id)">
        <div class="d-flex justify-content-center">
            <div class="w-75 border border-dark-subtle rounded p-3">
                <form action="{{ route('bills.update', [$flat->id,$bill->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row m-0 align-items-center  border mb-2 p-1">
                        <div class="col-2 text-end">
                            <h5>{{ $bill->category->name }} :</h5>
                        </div>
                        <div class="col-3">
                            <x-form.input label="Amount" type="text" id="amount" placeholder="Enter Amount" :value="$bill->amount"/>
                        </div>
                        <div class="col-7">
                            <x-form.input label="Note" type="text" id="note" placeholder="Enter Note" :value="$bill->notes"/>
                        </div>
                    </div>
                    <x-form.submit-btns class="text-center" :route-name="route('bills.index', $flat->id)">Update</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
