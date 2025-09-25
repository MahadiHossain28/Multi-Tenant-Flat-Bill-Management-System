@props([
    'title' => 'Add Title',
])
<div class="flex-grow-1 border border-dark-subtle rounded p-3">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $title }}</h5>
        <div>
            {{ $actions ?? '' }}
        </div>
    </div>
    <hr>
    {{ $slot }}
</div>
