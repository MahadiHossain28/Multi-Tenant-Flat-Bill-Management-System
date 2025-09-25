@props([
    'id',
    'value' => null,
])
<div class="form-check">
    <input
            type="radio"
            name="{{$id}}"
            id="{{$id}}"
            value="{{$value}}"
            {{$attributes->merge()->class('form-check-input')}}
            @checked(old($id) == $value)
    >
    <label class="form-check-label" for="{{$id}}">
        {{ $slot }}
    </label>
</div>
