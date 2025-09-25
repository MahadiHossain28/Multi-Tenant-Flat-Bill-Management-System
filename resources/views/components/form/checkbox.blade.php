@props([
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
                name="{{$id.'[]'}}"
            @checked(in_array($value, old($id, $oldValue)))
            @else
                name="{{$id}}"
            @checked(old($id) == $value)
            @endisset
            value="{{$value}}"
            id="{{$id}}"
    >
    <label class="form-check-label" for="{{$id}}">
        {{ $slot }}
    </label>
</div>
