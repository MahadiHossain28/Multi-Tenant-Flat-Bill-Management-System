@extends('master')

@section('content')
    <x-admin.body title="Edit House Owner">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('owner.update', $owner->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <x-form.input label="Name" type="text" id="name" placeholder="Enter Name" :value="$owner->name"/>
                    <div class="row">
                        <div class="col-6">
                            <x-form.input label="Email" type="email" id="email" placeholder="Enter Email" :value="$owner->email"/>
                        </div>
                        <div class="col-6">
                            <x-form.input label="Phone" type="text" id="phone" placeholder="Enter Phone" :value="$owner->phone"/>
                        </div>
                    </div>
                    <x-form.input label="Building Name" type="text" id="building_name" placeholder="Enter Name" :value="$owner->building->name"/>
                    <x-form.input label="Building Address" type="text" id="building_address" placeholder="Enter Address" :value="$owner->building->address"/>

                    <x-form.submit-btns class="text-center" :route-name="route('owner.index')">Update</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
