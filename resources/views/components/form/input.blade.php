@props([
    'label',
    'id',
    'name',
    'value' => null,
    'isModal' => null,
])

<div class="mb-3">

    <label
            for="{{$id}}"
            class="form-label"
    >
        {{$label}} :
    </label>

    <input
            class="form-control @error($name) is-invalid @enderror"
            id="{{$id}}"
            name="{{$name}}"
            value="{{old($name,$value)}}"
            {{ $attributes }}
    >

    @isset($isModal)
        <span class="mt-1 text-danger text-capitalize errorMsg {{$name . "_error"}}"></span>
    @else
        @error($name)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
