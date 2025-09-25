{{--    To Make Dynamic Select      --}}
{{--    Add Below Jquery Script     --}}
{{--    on change function      --}}
{{--    let id = $(this).val();     --}}
{{--    $('[data-parentId]').attr('hidden', 'true');        --}}
{{--    $('[data-parentId="' + id + '"]').removeAttr('hidden');     --}}

@props([
    'label',
    'id',
    'isModal' => null
])

<div class="mb-3">
    <label
            for="{{$id}}"
            class="form-label"
    >
        {{$label}} :
    </label>

    <select
            class="form-select @error($id) is-invalid @enderror"
            id="{{$id}}"
            name="{{$id}}"
            {{ $attributes }}
    >
        <option hidden value="">Open this select menu</option>
        @if ($slot->isEmpty())
            <option value="">Hello, There are no content added to slot.</option>
        @else
            {{ $slot }}
        @endif
    </select>

    @isset($isModal)
        <span class="mt-1 text-danger text-capitalize errorMsg {{$id . "_error"}}"></span>
    @else
        @error($id)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
