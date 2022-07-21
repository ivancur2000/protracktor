<div class="row mb-20">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-bold fs-6">
        <h3>{{ $data['label'] }}</h3>
        <small>Connect your protracktor account SoftPro</small>
    </label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8 bg-white rounded px-12 py-5">
        <form wire:submit.prevent="update">
            <!--begin::Row-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-lg-6">
                    <label for="app_id_{{ str_replace(' ', '', $data['label']) }}" class="form-label mb-2">App ID</label>
                    <input type="text" name="fname" id="app_id_{{ str_replace(' ', '', $data['label']) }}"
                        class="form-control form-control-lg mb-3 mb-lg-0" required
                        placeholder="App ID" wire:model="data.app_id">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="app_secret_id_{{ str_replace(' ', '', $data['label']) }}" class="form-label">App Secret ID</label>
                    <input type="text" name="lname" id="app_secret_id_{{ str_replace(' ', '', $data['label']) }}"
                        class="form-control form-control-lg" placeholder="App Secret ID" required
                        wire:model="data.app_secret_id">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <button type="submit" class="btn btn-primary">Connect Account</button>
                </div>
            </div>
        </form>
    </div>
    <!--end::Col-->
</div>