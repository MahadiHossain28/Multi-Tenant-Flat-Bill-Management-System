@extends('master')

@section('content')
    <x-admin.body title="Flat List">
        <x-slot:actions>
            <a href="{{ route('flat.create') }}" class="btn btn-dark btn-sm">Add New</a>
        </x-slot:actions>

        <x-table :headers="['#', 'Flat Name', 'Building Info', 'Owner Info', 'Action']">
            @forelse($flats as $key=>$flat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $flat->name }}</td>
                    <td>
                        {{ $flat->building->name }}
                    </td>
                    <td>
                        {{ $flat->owner_name }} <br>
                        {{ $flat->owner_contact }} <br>
                        {{ $flat->owner_email }} <br>
                    </td>
                    <td>
                        <a href="{{ route('flat.edit', $flat->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        <form action="{{ route('flat.destroy', $flat->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete {{ $flat->name }} building?');">
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
    </x-admin.body>
@endsection
