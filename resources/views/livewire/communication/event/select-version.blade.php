<div>
    @if($status === 'OK')
        <div class="alert alert-success">
            The event version was successfully restored
        </div>
    @endif
    <div class="d-flex flex-row border border-gray-500 border-active active p-5">
        <div class="w-350px p-5">
            <div class="d-flex align-items-center justify-content-center bg-success p-3 mb-4"
                style="cursor: pointer;" wire:click="setCurrentVersion">
                <span class="text-white fw-bold d-block fs-3">Current Version</span>
            </div>
            <div class="card-body pt-2 bg-white">
                @foreach ($event->event_versions as $event_version)
                    <!--begin::Item-->
                    <label style="cursor: pointer;">
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Bullet-->
                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                            <!--end::Bullet-->
                            <!--begin::Checkbox-->
                            <div class="form-check form-check-custom form-check-solid mx-5">
                                <input class="form-check-input" wire:model="event_version_id_selected" type="radio"
                                    name="event_version_id_selected"
                                    value="{{$event_version->id}}"
                                    wire:change="$emit('fadeOutPreview')">
                            </div>
                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $event_version->user_creator->name }}</a>
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold d-block">Created {{ $event_version->created_at->diffForHumans(); }}</span>
                                    <span class="text-muted fw-bold d-block">{{ $event_version->created_at_formated }}</span>
                                    <span class="text-muted fw-bold d-block">
                                        <button id="edit-block-button" class="btn btn-link btn-sm" type="button">Edit current version</a>    
                                    </span>
                                </div>
                            </div>
                            <!--end::Description-->
                        </div>
                    </label>
                    <!--end:Item-->
                @endforeach
            </div>
        </div>
        <div class="col"
            x-data="{ shown: true }"
            x-init="
            @this.on('fadeOutPreview', () => {
                shown = false;
                Livewire.emit('selectVersion');
            });
            @this.on('fadeInPreview', () => {
                shown = true;
                window.scrollTo(0, 0);
            });
            @this.on('scrollUp', () => {
                window.scrollTo(0, 0);
            });"
            x-show="shown"
            x-transition.duration.500ms>
            <div class="border border-gray-500 border-active active">
                <div class="card card-flush shadow-sm m-5 h-300px"
                    @if ($event_version_selected->bg_block_image())
                        style="background: url({{ $event_version_selected->bg_block_image()}});
                        background-size: 100% auto;"
                    @endif>
                    <!--<div class="card-body" style="background-image:url('/images/background.png')">-->
                    <div class="card-body">
                        <div class="border border-gray-500 border-active active w-200px h-150px 
                            d-flex align-items-center justify-content-center bg-secondary"
                            @if ($event->active_version->logo_block_image())
                                style="background: url({{ $event_version_selected->logo_block_image()}});
                                background-size: 100% auto;"
                            @endif
                            >
                        </div>
                    </div>
                </div>
                @foreach ($event_version_selected->text_blocks as $text_block)
                <div class="m-5">
                    {!! $text_block->block_content !!}
                </div>
                @endforeach
                <div class="m-5 w-250px">
                    {!! $event_version_selected->sign_block()->block_content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-end mt-5 mb-5">
        <button class="btn btn-info m-2 p-5" wire:click="restoreVersion">
            <span wire:loading wire:target="restoreVersion" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Restore this Version
        </button>
    </div>
</div>