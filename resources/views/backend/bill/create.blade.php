@extends('master')

@section('content')
    <x-admin.body title="Add Bill For {{ $flat->number }}" :route="route('bills.index', $flat->id)">
        <div class="d-flex justify-content-center">
            <div class="w-75 border border-dark-subtle rounded p-3">
                <form action="{{ route('bills.store', $flat->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="category_count" value="{{ $categories->count() }}">
                    @foreach($categories as $index => $category)
                        <div class="row m-0 align-items-center  border mb-2 p-1">
                            <div class="col-2 text-end">
                                <input type="hidden" name="category_id[{{ $index }}]" value="{{ $category->id }}">
                                <h5>{{ $category->name }} :</h5>
                            </div>
                            <div class="col-3">
                                <x-form.input label="Amount" type="text" id="amount_{{ $index }}" name="amount[{{ $index }}]" placeholder="Enter Amount"/>
                            </div>
                            <div class="col-7">
                                <x-form.input label="Note" type="text" id="note_{{ $index }}" name="note[{{ $index }}]" placeholder="Enter Note"/>
                            </div>
                        </div>
                    @endforeach
                    <x-form.submit-btns class="text-center" :route-name="route('flat.index')">Add</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
