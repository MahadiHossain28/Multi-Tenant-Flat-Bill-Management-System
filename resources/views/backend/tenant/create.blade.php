@extends('master')

@section('content')
    <x-admin.body title="Add Tenant">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('tenant.store') }}" method="post">
                    @csrf
                    <x-form.select label="Select Building" id="building_id">
                        @foreach($buildings as $building)
                            <option value="{{$building->id }}" @selected(old('building_id') == $building->id)>{{ $building->name }}</option>
                        @endforeach
                    </x-form.select>

                    <x-form.input label="Tenant Name" type="text" id="name" placeholder="Enter Tenant Name"/>
                    <x-form.input label="Tenant Contact" type="text" id="contact" placeholder="Enter Tenant Contact"/>
                    <x-form.input label="Tenant Email" type="text" id="email" placeholder="Enter Tenant Email"/>

                    <x-form.submit-btns class="text-center" :route-name="route('tenant.index')">Add</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
