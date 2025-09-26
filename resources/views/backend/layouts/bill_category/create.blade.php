@extends('master')

@section('content')
    <x-admin.body title="Add Bill Category">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('bill-category.store') }}" method="post">
                    @csrf
                    @role('admin')
                    <x-form.select label="Select Building" id="building_id">
                        @foreach($buildings as $building)
                            <option value="{{$building->id }}" @selected(old('building_id') == $building->id)>{{ $building->name }}</option>
                        @endforeach
                    </x-form.select>
                    @endrole

                    <x-form.input label="Category Name" type="text" id="name" placeholder="Enter Category Name"/>

                    <x-form.submit-btns class="text-center" :route-name="route('bill-category.index')">Add</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
