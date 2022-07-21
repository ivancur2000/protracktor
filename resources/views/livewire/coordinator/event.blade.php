<div class="d-flex align-items-center justify-content-between bg-secondary rounded p-0 mb-7 event-element" data-component="evemt">
    <button class="btn btn-lg btn-success p-6" type="button" data-component="send">
        SEND
    </button>
    <span data-component="description" class="text-muted fw-bold d-block fs-3">{{ $description }}</span>
    <div data-component="actions"  class="d-flex">
        @if ($mobile)
            <button class="btn btn-sm me-1 p-1" type="button">
                <i class="bi bi-phone-fill fs-2x"></i>
            </button>
        @endif
        <button class="btn btn-sm me-1 p-1" type="button">
            <i class="bi bi-eye-fill fs-2x"></i>
        </button>
        <a class="btn btn-sm me-1 p-1" type="button" href="">
            <i class="bi bi-pencil-fill fs-2x"></i>
        </a>
        <button class="btn btn-sm me-1 p-1" type="button">
            <i class="bi bi-sticky-fill fs-2x"></i>
        </button>
    </div>
    <span data-component="draft-text" class="d-block fs-5 p-6 fst-italic d-none" style="margin: 0 auto;">
        <span class="fw-bold">Draft Saved:</span>  January 11th at 1:37 PM  by Sally Representative
    </span>
</div>