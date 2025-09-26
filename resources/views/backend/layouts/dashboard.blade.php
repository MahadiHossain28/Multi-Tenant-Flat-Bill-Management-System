@extends('master')

@section('content')
    <div class="flex-grow-1 border border-dark-subtle rounded p-3">
        <div class="row g-3">
            @role('house_owner')
            <div class="col-12 border-bottom pb-2">
                <h5 class="mb-0">Building Information</h5>
            </div>
            <div class="col-12">
                <h4>Name: {{ $building->name }}</h4>
                <p>Location: {{ $building->address }}</p>
            </div>
            @endrole

            @role('admin')
            <div class="row g-3 m-0 p-0 mb-3">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-4">
                            <div class="m-2">
                                <h1>{{ $house_owner_count }}</h1>
                                <p class="text-muted fs-5 mb-0">Houser</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-4">
                            <div class="m-2">
                                <h1>{{ $building_count }}</h1>
                                <p class="text-muted fs-5 mb-0">Building</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card rounded-4 shadow">
                        <div class="card-body p-4">
                            <div class="m-2">
                                <h1>{{ $tenant_count }}</h1>
                                <p class="text-muted fs-5 mb-0">Tenant</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
@endsection
