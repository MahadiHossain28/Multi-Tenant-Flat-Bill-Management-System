@extends('master')

@section('content')
    <x-admin.body title="Flat List">
        <x-slot:actions>
            <a href="{{ route('flat.create') }}" class="btn btn-dark btn-sm">Add New</a>
        </x-slot:actions>

        <x-table :headers="['#', 'Flat Number', 'Building Details', 'Owner Details', 'Tenant Details', 'Action']">
            @forelse($flats as $key=>$flat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $flat->number }}</td>
                    <td>
                        {{ $flat->building->name }}
                    </td>
                    <td>
                        {{ $flat->owner_name }} <br>
                        {{ $flat->owner_contact }} <br>
                        {{ $flat->owner_email }} <br>
                    </td>
                    <td>
                        @if($flat->tenant != null)
                            {{ $flat->tenant->name }} <br>
                            {{ $flat->tenant->contact }} <br>
                            {{ $flat->tenant->email }} <br>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="{{ route('flat.edit', $flat->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form action="{{ route('flat.destroy', $flat->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete {{ $flat->number }} building?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                            </form>
                            @if($flat->tenant == null)
                                <a href="{{ route('flat.assign.tenant', $flat->id) }}" class="btn btn-dark btn-sm">Assign Tenant</a>
                            @else
                                <a href="{{ route('flat.remove.tenant', $flat->tenant->id) }}" class="btn btn-danger btn-sm">Remove Tenant</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Data Added.</td>
                </tr>
            @endforelse
        </x-table>
        {{ $flats->links('pagination::bootstrap-5') }}
    </x-admin.body>
@endsection
