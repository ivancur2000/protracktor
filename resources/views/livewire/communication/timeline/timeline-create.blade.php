<div x-data="{containers: null, swappable: null, empty: true}"
    x-init="
        containers = document.querySelectorAll(`.draggable-zone`);

        if (containers.length === 0) {
            return false;
        }

        swappable = new Sortable(containers, {
            draggable: `.draggable`,
            handle: `.draggable .draggable-handle`,
            mirror: {
                //appendTo: selector,
                appendTo: `body`,
                constrainDimensions: true
            }
        });
        
        swappable.on('drag:start', (evt) => {
            if (evt.originalEvent.target.tagName === 'I') {
                evt.cancel();
            }
        });
        
        swappable.on('drag:move', (evt) => {
            if (evt.source.parentElement.id === 'selected') {
                empty = false;
            }
        });

        swappable.on('drag:stopped', (evt) => {
            let source_ids = document.querySelector('#source').querySelectorAll('.event_id');
            let selected_ids = document.querySelector('#selected').querySelectorAll('.event_id');
            
            let source_ids_value = [...source_ids].map((data) => {
                return data.value;
            });

            let selected_ids_value = [...selected_ids].map((data) => {
                return data.value;
            });
            Livewire.emit('updateEvents', source_ids_value, selected_ids_value);
        });
        
        @this.on('empty', () => {
            empty = true;
        });

        @this.on('scrollUp', () => {
            window.scrollTo(0, 0);
        });
    ">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="card mb-10">
        <div class="card-body my-20 mx-10">
            <form wire:submit.prevent="submit" method="POST">
                <div class="pb-10">
                    <span class="fs-2hx fw-bolder me-2 lh-1 ls-n2 mb-10">Email Options</span>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <div id="source" class="d-flex flex-column w-500px draggable-zone">
                        @foreach ($events as $event)
                        <div class="draggable">
                            <input type="hidden" value="{{ $event->id }}" class="event_id">
                            <div class="d-flex align-items-center justify-content-between bg-secondary rounded p-3 mb-7 border border-gray-900 draggable-handle">
                                <span class="text-primary fw-bold d-block fs-3 ">{{ $event->name }}</span>
                                <div class="d-flex h-40px">
                                    @if ($event->sms)
                                    <button class="btn btn-sm me-1 p-1" type="button">
                                        <i class="bi bi-phone-fill fs-2x"></i>
                                    </button>
                                    @endif
                                    @if ($event->preview)
                                    <a class="btn btn-sm me-1 p-1" href="{{ route('communication.event.show', $event)}}">
                                        <i class="bi bi-eye-fill fs-2x"></i>
                                    </a>
                                    @endif
                                    @if ($event->edit)
                                    <a class="btn btn-sm me-1 p-1" href="{{ route('communication.event.edit', $event)}}">
                                        <i class="bi bi-pencil-fill fs-2x"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div id="create-email-button" class="d-flex p-3 mb-7">
                            <a href="{{ route('communication.event.create') }}" class="d-flex btn btn-sm me-1 p-0" type="button">
                                <i class="bi bi-plus-lg fs-2x"></i>
                                <span class="text-black fw-bold d-block fs-3">CREATE CUSTOM  EMAIL</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column w-600px">
                        <div class="d-flex flex-row">
                            <div class="col-md">
                                <label class="labels">Timeline Name</label>
                                <input type="text" class="form-control" placeholder="Timeline Name" name="name" wire:model="name" required>
                            </div>
                        </div>
                        <div class="d-flex border border-gray-900">
                            <div id="selected" class="card shadow-sm flex-column flex-column-fluid min-h-800px draggable-zone"
                                :class="{'justify-content-center align-items-center': empty, 'p-10': !empty}" >
                                <div class="w-200px text-center" x-show="empty">
                                    <i class="bi bi-arrows-move fs-2x"></i>
                                    <br>
                                    Drag email here to add to timeline
                                </div>
                                @foreach ($selected_events as $selected_event)
                                    <div class="draggable">
                                        <input type="hidden" value="{{ $selected_event->id }}" class="event_id">
                                        <div class="d-flex align-items-center justify-content-between bg-secondary rounded p-3 mb-7 border border-gray-900 draggable-handle">
                                            <span class="text-primary fw-bold d-block fs-3 ">{{ $selected_event->name }}</span>
                                            <div class="d-flex h-40px">
                                                @if ($selected_event->sms)
                                                <button class="btn btn-sm me-1 p-1" type="button">
                                                    <i class="bi bi-phone-fill fs-2x"></i>
                                                </button>
                                                @endif
                                                @if ($selected_event->preview)
                                                <button class="btn btn-sm me-1 p-1" type="button">
                                                    <i class="bi bi-eye-fill fs-2x"></i>
                                                </button>
                                                @endif
                                                @if ($selected_event->edit)
                                                <a class="btn btn-sm me-1 p-1" type="button" href="{{ route('communication.event.edit', $event)}}">
                                                    <i class="bi bi-pencil-fill fs-2x"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                            @csrf
                            <button class="btn btn-dark m-2 p-5">
                                Save Draft
                            </button>
                        </div>
                        <div class="d-flex flex-column w-600px">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Timeline Version History</h3>
                                </div>
                                <div class="card-body">
                                    @if ($timeline)
                                        @foreach ($timeline->timeline_versions as $timeline_version)
                                        <div wire:key="product-description-{{ $timeline_version->id }}" class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="fw-bolder text-gray-700 fw-bold fs-5 me-2">
                                                Version {{ $timeline_version->name }} ({{ $timeline_version->lastUpdated() }})
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter my-1">
                                                @if ($timeline_version->id === $timeline->timeline_version_id && $timeline->publish)
                                                <div class="bg-success fw-bolder text-light-success p-3 rounded-2">
                                                    Published
                                                </div>
                                                @else
                                                    <button type="button" wire:click="publish({{ $timeline_version->id  }})" class="btn btn-info btn-sm">
                                                        Publish Timeline
                                                    </button>
                                                @endif
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>