@props([
    'name',
    'id',
    'value' => null,
])
<div class="form-check">
    <input
            type="radio"
            name="{{$name}}"
            id="{{$id}}"
            value="{{$value}}"
            {{$attributes->merge()->class('form-check-input')}}
            @checked(old($name) == $value)
    >
    <label class="form-check-label" for="{{$id}}">
        {{ $slot }}
    </label>
</div>