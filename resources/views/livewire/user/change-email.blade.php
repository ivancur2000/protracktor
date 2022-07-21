
<form x-data="{ show: true, edit: false, }"
    x-init="
        @this.on('saved', () => {
            edit = false;
            setTimeout(() => {
                show = true;
                setTimeout(() => {
                    location.reload();                
                }, 2000);
            }, 500);
        });"
    x-transition.duration.500ms
    wire:submit.prevent="updateEmail" role="form">
    
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
    <div class="d-flex justify-content-between mb-7">
        <div>
            <div>
                <label for="state.email">Email Address</label>
            </div>
            <div class="text-muted" x-show="show" 
                x-transition.duration.500ms>
                {{ $state['email'] }}
            </div>
            <div class="text-muted" x-show="edit" 
                x-transition.duration.500ms>
                <input id="state.email" type="email" class="form-control" wire:model="state.email">
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-light" x-show="show"
            @click="
                show = false;
                setTimeout(() => {
                    edit = true;
                }, 500);
            ">Change Email</button>
            <button type="button" class="btn btn-secondary me-2" x-show="edit" 
                @click="
                    edit = false;
                    setTimeout(() => {
                        show = true;
                    }, 500);
                ">Cancel</button>
            <button type="submit" class="btn btn-primary" x-show="edit">Save</button>
        </div>
    </div>
</form>