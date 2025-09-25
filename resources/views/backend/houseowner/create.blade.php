@extends('master')

@section('content')
    <x-admin.body title="Add House Owner">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('owner.store') }}" method="post">
                    @csrf
                    <x-form.input label="Name" type="text" id="name" placeholder="Enter Name"/>
                    <div class="row">
                        <div class="col-6">
                            <x-form.input label="Email" type="email" id="email" placeholder="Enter Email"/>
                        </div>
                        <div class="col-6">
                            <x-form.input label="Phone" type="text" id="phone" placeholder="Enter Phone"/>
                        </div>
                    </div>
                    <x-form.input label="Building Name" type="text" id="building_name" placeholder="Enter Name"/>
                    <x-form.input label="Building Address" type="text" id="building_address" placeholder="Enter Address"/>

                    <x-form.submit-btns class="text-center" :route-name="route('owner.index')">Add</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
