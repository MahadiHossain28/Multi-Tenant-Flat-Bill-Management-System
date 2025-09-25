@extends('master')

@section('content')
    <x-admin.body title="Tenant List">
        <x-slot:actions>
            <a href="{{ route('tenant.create') }}" class="btn btn-dark btn-sm">Add New</a>
        </x-slot:actions>

        <x-table :headers="['#', 'Tenant Details', 'Flat Details', 'Action']">
            @forelse($tenants as $key=>$tenant)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $tenant->name }} <br>
                        {{ $tenant->contact }} <br>
                        {{ $tenant->email }} <br>
                    </td>
                    <td>
                        {{ $tenant->flat?->number }} <br>
                        {{ $tenant->building->name }} <br>
                    </td>
                    <td>
                        <a href="{{ route('tenant.edit', $tenant->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete {{ $tenant->name }} building?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Data Added.</td>
                </tr>
            @endforelse
        </x-table>
        {{ $tenants->links('pagination::bootstrap-5') }}
    </x-admin.body>
@endsection
