@extends('master')

@section('content')
    <x-admin.body title="Edit Flat">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('flat.update', $flat->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @role('admin')
                    <x-form.select label="Select Building" id="building_id">
                        @foreach($buildings as $building)
                            <option value="{{$building->id }}" @selected(old('building_id', $flat->building_id) == $building->id)>{{ $building->name }}</option>
                        @endforeach
                    </x-form.select>
                    @endrole

                    <x-form.input label="Flat Number" type="text" id="number" placeholder="Enter Flat Number" :value="$flat->number"/>
                    <x-form.input label="Owner Name" type="text" id="owner_name" placeholder="Enter Owner Name" :value="$flat->owner_name"/>
                    <x-form.input label="Owner Contact" type="text" id="owner_contact" placeholder="Enter Owner Contact" :value="$flat->owner_contact"/>
                    <x-form.input label="Owner Email" type="text" id="owner_email" placeholder="Enter Owner Email" :value="$flat->owner_email"/>

                    <x-form.submit-btns class="text-center" :route-name="route('flat.index')">Update</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
