{{--    To Make Dynamic Select      --}}
{{--    Add Below Jquery Script     --}}
{{--    on change function      --}}
{{--    let id = $(this).val();     --}}
{{--    $('[data-parentId]').attr('hidden', 'true');        --}}
{{--    $('[data-parentId="' + id + '"]').removeAttr('hidden');     --}}

@props([
    'label',
    'id',
    'name',
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
            class="form-select @error($name) is-invalid @enderror"
            id="{{$id}}"
            name="{{$name}}"
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
        <span class="mt-1 text-danger text-capitalize errorMsg {{$name . "_error"}}"></span>
    @else
        @error($name)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
