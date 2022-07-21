<div class="card mb-10">
    <div class="card-body my-20 mx-10">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @foreach ($events as $event)
            <div class="d-flex align-items-center my-10">
                <div class="col me-2">
                    <div class="d-flex align-items-center justify-content-between bg-secondary rounded p-3 border border-gray-900">
                        <button class="btn btn-sm me-1 p-1" type="button">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/medicine/med005.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M18.0129 8.60388L9.88066 16.7362L5.00359 11.8591L6.62545 10.2372L9.88066 13.4924L16.3911 6.98202L18.0129 8.60388ZM2.3005 11.445C2.3005 8.76491 3.47376 6.36089 5.31416 4.68152L8.05176 7.41912V0.517613H1.15025L3.6808 3.04817C1.42631 5.14162 0 8.12077 0 11.445C0 17.4148 4.54349 22.3149 10.3523 22.89V20.5665C5.82027 20.0029 2.3005 16.1265 2.3005 11.445ZM23.005 11.445C23.005 5.4752 18.4615 0.575126 12.6528 0V2.32351C17.1848 2.88713 20.7045 6.76348 20.7045 11.445C20.7045 14.1251 19.5313 16.5291 17.6909 18.2085L14.9533 15.4709V22.3724H21.8548L19.3242 19.8418C21.5787 17.7484 23.005 14.7692 23.005 11.445Z" fill="#181C32"/>
                            </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <span class="text-primary fw-bold d-block fs-3">{{ $event->name }}</span>
                        <div class="d-flex h-40px">
                            @if ($event->sms)
                            <button class="btn btn-sm me-1 p-1" type="button">
                                <i class="bi bi-phone-fill fs-2x"></i>
                            </button>
                            @endif
                            @if ($event->preview)
                            <button class="btn btn-sm me-1 p-1" type="button">
                                <i class="bi bi-eye-fill fs-2x"></i>
                            </button>
                            @endif
                            @if ($event->edit)
                            <a class="btn btn-sm me-1 p-1" type="button" href="{{ route('communication.event.edit', $event)}}">
                                <i class="bi bi-pencil-fill fs-2x"></i>
                            </a>
                            @endif
                            @if ($event->config)
                            <div class="dropdown" style="cursor: pointer;">
                                <button class="btn btn-sm me-1 p-1" type="button" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill fs-2x"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" wire:click="delete({{ $event->id }})">Delete</a></li>
                                    <li><a class="dropdown-item" href="#">Publish</a></li>
                                    <li><a class="dropdown-item" href="#">Lock Order</a></li>
                                    <li>
                                        @if ($event->sms) 
                                            <a class="dropdown-item" wire:click="removeSMS({{ $event->id }})">Remove SMS</a>  
                                        @else
                                            <a class="dropdown-item" wire:click="addSMS({{ $event->id }})">Add SMS</a>  
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-between ms-2">
                    <span>
                        Last Updated: {{ $event->last_updated_at }} by {{ $event->last_user_modifier->full_name }}
                        @if ($event->event_version_id)
                            (Version {{ $event->active_version->name }}: {{ $event->active_version->created_at->format('m/d/Y')}})
                        @endif
                    </span>
                    <a class="btn btn-dark" href="{{ route('communication.event.selectVersion', $event->id)}}">Restore</a>
                </div>
            </div>
            @endforeach
            <div id="create-email-button" class="d-flex p-3 ms-10">
                <a href="{{ route('communication.event.create') }}" class="d-flex btn btn-sm me-1 p-0" type="button">
                    <i class="bi bi-plus-lg fs-2x"></i>
                    <span class="text-black fw-bold d-block fs-3">CREATE CUSTOM  EMAIL</span>
                </a>
            </div>
        </div>
    </div>
</div>