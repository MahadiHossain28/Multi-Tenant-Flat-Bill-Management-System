@extends('master')

@section('content')
    <x-admin.body title="Bill Category List">
        <x-slot:actions>
            <a href="{{ route('bill-category.create') }}" class="btn btn-dark btn-sm">Add New</a>
        </x-slot:actions>

        <x-table :headers="['#', 'Name', 'Building Details', 'Action']">
            @forelse($billCategories as $key=>$billCategory)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $billCategory->name }}
                    </td>
                    <td>
                        {{ $billCategory->building->name }}
                    </td>
                    <td>
                        <a href="{{ route('bill-category.edit', $billCategory->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        <form action="{{ route('bill-category.destroy', $billCategory->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete {{ $billCategory->name }} building?');">
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
        {{ $billCategories->links('pagination::bootstrap-5') }}
    </x-admin.body>
@endsection
