@props([
    'title' => 'Add Title',
    'route' => null
])
<div class="flex-grow-1 border border-dark-subtle rounded p-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            @isset($route)
                <a href="{{ $route }}" class="btn btn-sm btn-dark">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            @endisset
            <h5 class="mb-0">{{ $title }}</h5>
        </div>
        <div>
            {{ $actions ?? '' }}
        </div>
    </div>
    <hr>
    {{ $slot }}
</div>
