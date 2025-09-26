@extends('master')

@section('content')
    <x-admin.body title="House Owner List">
        <x-slot:actions>
            <a href="{{ route('owner.create') }}" class="btn btn-dark btn-sm">Add New</a>
        </x-slot:actions>

        <x-table :headers="['#', 'Name', 'Contact', 'Building Info', 'Action']">
            @forelse($houseOwners as $key=>$houseOwner)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $houseOwner->name }}</td>
                    <td>
                        {{ $houseOwner->email }} <br>
                        {{ $houseOwner->phone }}
                    </td>
                    <td>
                        {{ $houseOwner->building->name }} <br>
                        {{ $houseOwner->building->address }}
                    </td>
                    <td>
                        <a href="{{ route('owner.edit', $houseOwner->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        <form action="{{ route('owner.destroy', $houseOwner->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete {{ $houseOwner->name }} owner?');">
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
        {{ $houseOwners->links('pagination::bootstrap-5') }}
    </x-admin.body>
@endsection
