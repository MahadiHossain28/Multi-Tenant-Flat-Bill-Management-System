@props([
    'label',
    'id',
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
            class="form-control @error($id) is-invalid @enderror @isset($isSummerNote) summernote @endisset"
            id="{{$id}}"
            name="{{$id}}"
        {{ $attributes }}
    >{{old($id,$value)}}</textarea>

    @isset($isModal)
        <span class="mt-1 text-danger text-capitalize errorMsg {{$id . "_error"}}"></span>
    @else
        @error($id)
        <span class="mt-1 text-danger text-capitalize">{{ $message }}</span>
        @enderror
    @endisset
</div>
