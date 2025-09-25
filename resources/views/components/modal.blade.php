@props([
    'id',
    'title',
    'toggle' => '',
    'size' => ''
])
<div class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable {{ $size ?? '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$title}}</h1>
                <button type="button" class="btn-close"
                        @if($toggle === '')
                            data-bs-dismiss="modal"
                        @else
                            data-bs-toggle="modal"
                            data-bs-target="#{{$toggle}}"
                        @endif
                        aria-label="Close">
                </button>
            </div>
            <div class="modal-body pb-0">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
