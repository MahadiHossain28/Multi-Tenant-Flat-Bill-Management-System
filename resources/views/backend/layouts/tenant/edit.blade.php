@extends('master')

@section('content')
    <x-admin.body title="Edit Tenant">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('tenant.update', $tenant->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-form.select label="Select Building" id="building_id">
                        @foreach($buildings as $building)
                            <option value="{{$building->id }}" @selected(old('building_id', $tenant->assigned_building_id) == $building->id)>{{ $building->name }}</option>
                        @endforeach
                    </x-form.select>

                    <x-form.input label="Tenant Name" type="text" id="name" placeholder="Enter Tenant Name" :value="$tenant->name"/>
                    <x-form.input label="Tenant Contact" type="text" id="contact" placeholder="Enter Tenant Contact" :value="$tenant->contact"/>
                    <x-form.input label="Tenant Email" type="text" id="email" placeholder="Enter Tenant Email" :value="$tenant->email"/>

                    <x-form.submit-btns class="text-center" :route-name="route('tenant.index')">Update</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
