@props([
    'routeName' => null,
    'isModal' => null,
    'isDisabled' => null,
    'disabledBtnId' => null,
    'toggle' => ''
])

<div {{ $attributes }}>
    @isset($routeName)
        <a href="{{ $routeName }}" class="btn btn-sm btn-dark me-3 fs-6">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back
        </a>
    @endisset
    @isset($isModal)
        <button type="button" class="btn btn-sm btn-secondary fs-6"
                @if($toggle === '')
                    data-bs-dismiss="modal"
                @else
                    data-bs-toggle="modal"
                    data-bs-target="#{{$toggle}}"
                @endif>
            Close
        </button>
    @endif
    <button type="submit" class="btn btn-sm btn-success  fs-6" @isset($isDisabled) id="{{$disabledBtnId}}" disabled @endisset>
        <div class="submitBtnLoading" style="display: none">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span class="visually-show" role="status">Loading...</span>
        </div>
        <div class="submitBtnDetails">
            <i class="fa-regular fa-circle-check"></i>
            {{ $slot }}
        </div>
    </button>
</div>
