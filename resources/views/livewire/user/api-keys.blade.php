<div x-data="{
        api_key_edit_modal: null,
    }"
    x-init="
        api_key_edit_modal = new bootstrap.Modal(document.getElementById('api_key_edit_modal'), {backdrop: 'static'});

        @this.on('showModal', () => {
            api_key_edit_modal.show();
        });

        @this.on('updated', () => {
            api_key_edit_modal.hide();
        });
    ">
    <form class="w-md-75" wire:submit.prevent="create">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="label" class="form-label">API Key Label</label>
            <input type="text" class="form-control" id="label" placeholder="API Key Label" wire:model="label">
        </div>
        <div class="mb-3">
            <label for="api_key" class="form-label">API Key</label>
            <input type="text" class="form-control" id="api_key" placeholder="API Key" wire:model="api_key">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 bg-secondary">
                    <th class="px-2">Label</th>
                    <th class="px-2">API Keys</th>
                    <th class="px-2">Created</th>
                    <th class="px-2">Status</th>
                    <th class="px-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach (auth()->user()->api_keys as $api_key)
                    <tr>
                        <td class="px-2">{{ $api_key->label }}</td>
                        <td class="px-2">{{ $api_key->api_key }}</td>
                        <td class="px-2">{{ $api_key->created_at->format('m/d/Y') }}</td>
                        <td class="px-2"><span class="badge badge-light-success">{{ $api_key->status }}</span></td>
                        <td class="px-2">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton{{ $api_key->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Options
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $api_key->id }}">
                                    <li><a class="dropdown-item" 
                                        wire:click="edit({{ $api_key->id }})"
                                    ">Edit</a></li>
                                    <li><a class="dropdown-item" wire:click="delete({{ $api_key->id }})">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="api_key_edit_modal" tabindex="-1">
        <div class="modal-dialog">
            <form wire:submit.prevent="update">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title me-5">
                            Edit API Key
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="label_edit" class="form-label">API Key Label</label>
                            <input type="text" class="form-control" id="label_edit" placeholder="API Key Label" wire:model.defer="label_edit">
                        </div>
                        <div class="mb-3">
                            <label for="api_key_edit" class="form-label">API Key</label>
                            <input type="text" class="form-control" id="api_key_edit" placeholder="API Key" wire:model.defer="api_key_edit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex flex-row justify-content-end mt-5 mb-5">
                            <button type="submit" class="btn btn-secondary m-2 p-5">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>