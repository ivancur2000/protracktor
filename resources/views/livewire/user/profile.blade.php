<div x-data="{ overview: true, edit: false, profilePhotoModal: null, profilePhotoForm: null }" x-init="
        profilePhotoModal = new bootstrap.Modal(document.getElementById('profile_photo_modal'), {backdrop: 'static'});
        confirmRemoveModal = new bootstrap.Modal(document.getElementById('confirm_remove_modal'), {backdrop: 'static'});
        profilePhotoForm = document.getElementById('profile_photo_form');

        var profilePhotoDropzone = new Dropzone(`#profile_photo_dropzone`, {
            url: `{{ route('user.setProfilePhoto') }}`,
            paramName: `file`, 
            maxFiles: 1,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: `.jpeg,.jpg,.png,.gif`,
            headers: {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`,
            }
        });
        profilePhotoDropzone.options.autoProcessQueue = false;

        profilePhotoForm.onsubmit = (e) => {
            e.preventDefault();
            profilePhotoDropzone.processQueue();
        };
    
        profilePhotoDropzone.on('complete', (file) => {
            if (file.status === 'success') {
                setTimeout(() => {
                    location.reload();                
                }, 1000);
            }
        });

        @this.on('reload', () => {
            setTimeout(() => {
                location.reload();                
            }, 1000);
        });" ">
    <div class=" card shadow-sm">
    <div class="card-header">
        <h3 class="card-title fw-bolder">Profile Details</h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-primary" x-bind:disabled="edit" @click="
                        overview = false;
                        setTimeout(() => {
                            edit = true;
                        }, 500);
                    ">
                Edit Profile
            </button>
        </div>
    </div>
    <div class="card-body" x-show="overview" x-transition.duration.500ms>
        <div class="d-flex mb-8">
            <div class="w-400px">
                <span class="text-muted">Full Name</span>
            </div>
            <div>
                {{ auth()->user()->full_name }}
            </div>
        </div>
        <div class="d-flex mb-8">
            <div class="w-400px">
                <span class="text-muted">Company</span>
            </div>
            <div>
                {{ auth()->user()->company }}
            </div>
        </div>
        <div class="d-flex mb-8">
            <div class="w-400px">
                <span class="text-muted">Phone Number</span>
            </div>
            <div>
                {{ auth()->user()->phone_number }}
            </div>
        </div>
        <div class="d-flex mb-8">
            <div class="w-400px">
                <span class="text-muted">Time Zone</span>
            </div>
            <div>
                {{ auth()->user()->timezone }}
            </div>
        </div>
        <div class="d-flex mb-8">
            <div class="w-400px">
                <span class="text-muted">Account Access</span>
            </div>
            <div>
                {{ auth()->user()->account_access }}
            </div>
        </div>
    </div>
    <form x-show="edit" x-transition.duration.500ms wire:submit.prevent="updateProfileInformation" role="form">
        <div class="card-body">
            @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
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
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="full_name" class="text-muted">Avatar</label>
                </div>
                <div>
                    <div class="mb-5 position-relative">
                        @if (auth()->user()->profilePhotoSrc)
                        <img class="rounded-circle" width="150px" height="150px" src="{{ auth()->user()->profilePhotoSrc }}">
                        @else
                        <img class="rounded-circle" width="150px" height="150px" src="assets/media/avatars/blank.png">
                        @endif
                        <button type="button" class="btn position-absolute top-0 start-100 translate-middle badge badge-circle badge-lg badge-light shadow" @click="profilePhotoModal.show()">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button type="button" class="btn position-absolute top-100 start-100 translate-middle badge badge-circle badge-lg badge-light shadow" @click="confirmRemoveModal.show()">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="text-muted">
                        Allowed file types: png, jpg, jpeg.
                    </div>
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.name" class="text-muted">Full Name*</label>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill me-1">
                        <input type="text" class="form-control" id="state.name" wire:model="state.name">
                    </div>
                    <div class="flex-fill ms-1">
                        <input type="text" class="form-control" id="state.last_name" wire:model="state.last_name">
                    </div>
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.company" class="text-muted">Company*</label>
                </div>
                <div class="flex-fill">
                    <input type="text" class="form-control" id="state.company" wire:model="state.company">
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.phone_number" class="text-muted">Phone Number*</label>
                </div>
                <div class="flex-fill">
                    <input type="text" class="form-control" id="state.phone_number" wire:model="state.phone_number">
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.timezone" class="text-muted">Time Zone*</label>
                </div>
                <div class="flex-fill">                   
                    <select class="form-control" wire:model="state.timezone"  id="state.timezone" >
                        <option selected>Select</option>
                        <option value="Pacific Time">Pacific Time</option>
                        <option value="Mountain Time">Mountain Time</option>
                        <option value="Central Time">Central Time</option>
                        <option value="Eastern Time">Eastern Time	</option>
                    </select>
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.account_access" class="text-muted">Account Access*</label>
                </div>
                <div class="flex-fill">
                    <input type="text" class="form-control" id="state.account_access" wire:model="state.account_access">
                </div>
            </div>
            <div class="d-flex mb-8">
                <div class="w-400px">
                    <label for="state.location" class="text-muted">Location*</label>
                </div>
                <div class="flex-fill">
                    <input type="text" class="form-control" id="state.location" wire:model="state.location">
                </div>
            </div>
        </div>
        <div class="card-footer" style="text-align: right;" x-show="edit" x-transition.duration.500ms>
            <button class="btn btn-secondary me-2" type="button" @click="
                        edit = false;
                        setTimeout(() => {
                            overview = true;
                        }, 500);
                    ">Discard</button>
            <button class="btn btn-primary ms-2">Save Changes</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="profile_photo_modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="profile_photo_form" action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title me-5">
                        Profile Photo
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="dropzone" id="profile_photo_dropzone">
                        <!--begin::Message-->
                        <div class="dz-message needsclick">
                            <!--begin::Icon-->
                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                            <!--end::Icon-->

                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop file here or click to upload.</h3>
                                <span class="fs-7 fw-bold text-gray-400">upload files less than 10 MB</span>
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                        <button type="submit" class="btn btn-secondary m-2 p-5">
                            Upload Photo
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm_remove_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title me-5">
                    Remove Photo
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove the profile picture?</p>
            </div>
            <div class="modal-footer">
                <div class="d-flex flex-row justify-content-end">
                    @csrf
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-2">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-2" @click="
                                Livewire.emit('removePhoto');
                                confirmRemoveModal.hide();
                            ">
                        Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>