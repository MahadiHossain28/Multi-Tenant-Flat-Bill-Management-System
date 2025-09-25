@extends('master')

@section('content')
    <x-admin.body title="Add Flat">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('flat.store') }}" method="post">
                    @csrf
                    @role('admin')
                    <x-form.select label="Select Building" id="building_id">
                        @foreach($buildings as $building)
                            <option value="{{$building->id }}" @selected(old('building_id') == $building->id)>{{ $building->name }}</option>
                        @endforeach
                    </x-form.select>
                    @endrole

                    <x-form.input label="Flat Number" type="text" id="number" placeholder="Enter Flat Number"/>
                    <x-form.input label="Owner Name" type="text" id="owner_name" placeholder="Enter Owner Name"/>
                    <x-form.input label="Owner Contact" type="text" id="owner_contact" placeholder="Enter Owner Contact"/>
                    <x-form.input label="Owner Email" type="text" id="owner_email" placeholder="Enter Owner Email"/>

                    <x-form.submit-btns class="text-center" :route-name="route('flat.index')">Add</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
