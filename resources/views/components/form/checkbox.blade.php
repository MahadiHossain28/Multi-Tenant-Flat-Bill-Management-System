@props([
    'name',
    'value',
    'id',
    'arrayType' => null,
    'oldValue' => []
])
<div class="form-check">
    <input
            class="form-check-input"
            type="checkbox"
            {{ $attributes }}
            @isset($arrayType)
                name="{{$name.'[]'}}"
            @checked(in_array($value, old($name, $oldValue)))
            @else
                name="{{$name}}"
            @checked(old($name) == $value)
            @endisset
            value="{{$value}}"
            id="{{$id}}"
    >
    <label class="form-check-label" for="{{$id}}">
        {{ $slot }}
    </label>
</div>
