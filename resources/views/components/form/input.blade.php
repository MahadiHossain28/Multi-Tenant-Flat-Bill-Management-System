@props([
    'label',
    'id',
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
            class="form-control @error($id) is-invalid @enderror"
            id="{{$id}}"
            name="{{$id}}"
            value="{{old($id,$value)}}"
            {{ $attributes }}
    >

    @isset($isModal)
        <span class="mt-1 text-danger text-capitalize errorMsg {{$id . "_error"}}"></span>
    @else
        @error($id)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
