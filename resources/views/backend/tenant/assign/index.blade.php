@extends('master')

@section('content')
    <x-admin.body title="Assign Tenant To Flat {{ $flat->number }}">
        <div class="d-flex justify-content-center">
            <div class="w-50 border border-dark-subtle rounded p-3">
                <form action="{{ route('flat.assign.tenant.store', $flat->id) }}" method="post">
                    @csrf
                    <x-form.select label="Select Tenant" id="tenant_id">
                        @foreach($tenants as $tenant)
                            <option value="{{$tenant->id }}" @selected(old('tenant_id') == $tenant->id)>{{ $tenant->name }}</option>
                        @endforeach
                    </x-form.select>

                    <x-form.submit-btns class="text-center" :route-name="route('flat.index')">Assign</x-form.submit-btns>
                </form>
            </div>
        </div>
    </x-admin.body>
@endsection
