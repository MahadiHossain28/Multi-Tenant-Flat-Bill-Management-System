@extends('master')

@section('content')
    <div class="flex-grow-1 border border-dark-subtle rounded p-3">
        <div class="row g-3">
            @role('house_owner')
            <div class="col-12 border-bottom pb-2">
                <h5 class="mb-0">Building Information</h5>
            </div>
            <div class="col-12">
                <p>{{ $building->name }}</p>
            </div>
            @endrole
        </div>
    </div>
@endsection
