@props([
    'label',
    'id',
    'name',
    'value' => null,
    'isModal' => null,
    'isSummerNote' => null
])

<div class="mb-3">
    <label
            for="{{$id}}"
            class="form-label"
    >
        {{$label}} :
    </label>

    <textarea
            class="form-control @error($name) is-invalid @enderror @isset($isSummerNote) summernote @endisset"
            id="{{$id}}"
            name="{{$name}}"
        {{ $attributes }}
    >{{old($name,$value)}}</textarea>

    @isset($isModal)
        <span class="mt-1 text-danger text-capitalize errorMsg {{$name . "_error"}}"></span>
    @else
        @error($name)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
