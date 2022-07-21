@extends('layouts.theme.app')
@section('mainSection', 'Orders')
@section('pageTitle', 'Dashboard - Orders')
@section('content')
<div class="card shadow-sm m-5">
    <div class="card-header">
        <h3 class="card-title">
            {{ $order['orderStatus']}}
            <div class="symbol symbol-20px symbol-circle ms-2">
                <span class="symbol-label bg-success">
                </span>
            </div>
        </h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm p-1">
                <i class="bi bi-arrow-repeat fs-2x"></i>
            </button>
            <button type="button" class="btn btn-sm p-1">
                <i class="bi bi-gear-fill fs-2x"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="mt-2 mb-2">
            <h3 class="d-inline">ID: {{ $order['orderId']}}</h3> {{ $order['fileType']}}
        </div>
        <div class="d-flex justify-content-between my-2">
            <div>
                {{ $order['propertyAddress']}}
            </div>
            <div>
                {{ $order['updatedBy']}}
            </div>
        </div>
        <div class="d-flex justify-content-between my-2">
            <div>
                {{ $order['settlementDate']}}
            </div>
            <div>
                <a href="#" class="btn btn-link">
                    View History
                </a>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-row m-5 gap-5">
    <div class="col">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h3 class="card-title">
                    Buyer/Borrower:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['buyer']}}
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div>
                    Buying Agent:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['buyingAgent']}}
                    </a>
                </div>
                <div>
                    Lender:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['lender']}}
                    </a>
                </div>
                <div>
                    Other:
                    <a href="#" class="btn btn-link mx-1">
                        {{ $order['otherBuyer']}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h3 class="card-title">
                    Seller:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['seller']}}
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <div>
                    Listing Agent:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['listingAgent']}}
                    </a>
                </div>
                <div class="mt-1 mb-1">
                    Other:
                    <a href="#" class="btn btn-link ms-1">
                        {{ $order['otherSeller']}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-row m-5 gap-5">
    <div class="col">
        
        @foreach ($timeLine->version_active->event_versions as $event_version)
        <div>
            <div class="d-flex align-items-center justify-content-between bg-secondary rounded p-3 mb-7 border border-gray-900 draggable-handle">
                <button class="btn btn-lg btn-success p-6" type="button" data-component="send">
                    SEND
                </button>
                <span class="text-primary fw-bold d-block fs-3 ">{{ $event_version->event->name }}</span>
                <div class="d-flex h-40px">
                    @if ($event_version->event->sms)
                    <button class="btn btn-sm me-1 p-1" type="button">
                        <i class="bi bi-phone-fill fs-2x"></i>
                    </button>
                    @endif
                    @if ($event_version->event->preview)
                    <a class="btn btn-sm me-1 p-1" href="{{ route('communication.event.show', $event_version->event)}}">
                        <i class="bi bi-eye-fill fs-2x"></i>
                    </a>
                    @endif
                    <button class="btn btn-sm me-1 p-1" type="button">
                        <i class="bi bi-sticky-fill fs-2x"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="card shadow-sm m-5">
    <div class="card-header">
        <h3 class="card-title">
            Documents
        </h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm p-1">
                <i class="bi bi-plus fs-2x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="send-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title me-5">
                    Welcome
                </h2>
                <button id="save-draft" class="btn" type="button">
                    <i class="bi bi-save-fill fs-2x"></i>
                    Save Draft
                </button>
                <button class="btn" type="button">
                    <i class="bi bi-eye-fill fs-2x"></i>
                    Preview Email
                </button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex gap-2 my-2">
                    <a class="btn btn-link w-30px">To:</a>
                    <input type="text" class="form-control" placeholder="Name" value="Jim Smith">
                </div>
                <div class="d-flex gap-2 my-2">
                    <a class="btn btn-link w-30px">CC:</a>
                    <input type="text" class="form-control" placeholder="Name" value="Carla Jackson, Tom Barnes, Jill Anderson, Barb Watson">
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Name" value="Welcome -1335 Main Street Woodbury">
                </div>
                <div>
                    <button class="btn btn-link mx-2" type="button">
                        <i class="bi bi-paperclip fs-2x"></i>
                        Document title here
                    </button>
                    <button class="btn btn-link mx-2" type="button">
                        Another Document here
                    </button>
                </div>
                <div>
                    <textarea id="editor-text">
                        <p>
                            Enter additional information if necessary. It will appear above the message seen below.
                        </p>
                    </textarea>
                </div>
                <div class="position-relative">
                    <div id="edit-container" class="d-flex block-action-container flex-column p-6">
                        <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                            <button id="btn-edit-email" class="btn btn-sm me-1 p-1 fs-2hx" type="button">
                                <i class="bi bi-pencil-square fs-2x"></i>
                                Edit
                            </button>
                        </div>
                    </div>
                    <div id="email-container" class="border border-gray-500 border-active active opacity-25">
                        <div class="card card-flush shadow-sm m-5 h-300px">
                            <!--<div class="card-body" style="background-image:url('/images/background.png')">-->
                            <div class="card-body">
                                <div class="border border-gray-500 border-active active w-200px h-150px 
                                    d-flex align-items-center justify-content-center bg-secondary">
                                    <h1>
                                        Insert Logo
                                        <button class="btn btn-sm me-1 p-1" type="button">
                                            <i class="bi bi-pencil-fill fs-2x"></i>
                                        </button>
                                    </h1>
                                </div>
                                <div class="d-flex align-items-center justify-content-center block-name-container">
                                    <h1>
                                        Image Background
                                        <button class="btn btn-sm me-1 p-1" type="button">
                                            <i class="bi bi-pencil-fill fs-2x"></i>
                                        </button>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div data-component="block" class="card card-flush shadow-sm m-5">
                            <div class="card-body">
                                <div class="d-flex block-action-container flex-column p-6">
                                    <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                        <h1>Block 1</h1>
                                    </div>
                                </div>
                                <div data-component="content">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                </div>
                            </div>
                        </div>
                        <div data-component="block" class="card card-flush shadow-sm m-5">
                            <div class="card-body">
                                <div class="d-flex block-action-container flex-column p-6">
                                    <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                        <h1>Block 2</h1>
                                    </div>
                                </div>
                                <div data-component="content">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                    </p>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div data-component="block" class="card card-flush shadow-sm m-5">
                            <div class="card-body">
                                <div class="d-flex block-action-container flex-column p-6">
                                    <div class="d-flex align-items-center justify-content-center flex-column-fluid">
                                        <h1>Block 3</h1>
                                    </div>
                                </div>
                                <div data-component="content">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush shadow-sm m-5 d-flex w-250px">
                            <div class="card-body">
                                <p>Thank you</p>
                                <br>
                                <p>&#60;Contact Name&#62;</p>
                                <p>&#60;Business Name&#62;</p>
                                <p>&#60;Business Address&#62;</p>
                                <p>&#60;City&#62; &#60;St&#62; &#60;Zip&#62;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                    <button class="btn btn-info m-2 p-5">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts-by-view')
<script src="/assets/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    const sendModal = new bootstrap.Modal(document.querySelector('#send-modal'), {});
    const sendButtons = document.querySelectorAll('[data-component="send"]');
    const events = document.querySelectorAll('[data-component="evemt"]');
    const btnEditEmail = document.querySelector('#btn-edit-email');
    const editContainer = document.querySelector('#edit-container');
    const emailContainer = document.querySelector('#email-container');
    const saveDraft = document.querySelector('#save-draft');

    tinymce.init({
        selector: '#editor-text',
        height: '300'
    });

    sendButtons.forEach((sendButton) => {
        sendButton.addEventListener('click', (e) => {
            sendModal.show();
        });
    });

    btnEditEmail.addEventListener('click', (e) => {
        editContainer.classList.add("d-none");
        emailContainer.classList.remove("opacity-25");
    });

    saveDraft.addEventListener('click', (e) => {
        sendModal.hide();

        const sendButton = events[0].querySelector('[data-component="send"]');
        const descriptionText = events[0].querySelector('[data-component="description"]');

        sendButton.classList.remove('btn-success');
        sendButton.classList.add('bg-warning');
        sendButton.status = 'draft';
        sendButton.innerHTML = 'DRAFT';

        descriptionText.classList.remove('text-muted');
        descriptionText.classList.add('text-warning');
    });

    events.forEach((event) => {
        const sendButton = event.querySelector('[data-component="send"]');
        const descriptionText = event.querySelector('[data-component="description"]');
        const actionsDiv = event.querySelector('[data-component="actions"]');

        const draftText = event.querySelector('[data-component="draft-text"]');

        event.addEventListener('mouseover', (e) => {
            if (sendButton.status === 'draft') {
                sendButton.classList.add('d-none');
                descriptionText.classList.add('d-none');
                actionsDiv.classList.add('d-none');
                draftText.classList.remove('d-none');
            }
        });

        event.addEventListener('mouseout', (e) => {
            if (sendButton.status === 'draft') {
                sendButton.classList.remove('d-none');
                descriptionText.classList.remove('d-none');
                actionsDiv.classList.remove('d-none');
                draftText.classList.add('d-none');
            }
        });
    });
</script>
@endsection