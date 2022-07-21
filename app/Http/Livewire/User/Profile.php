<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    public $state = [];
    protected $listeners = ['removePhoto' => 'removePhoto'];

    public function mount()
    {
        $this->state = auth()->user()->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.user.profile');
    }

    public function updateProfileInformation(UpdateUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(auth()->user(), $this->state);

        session()->flash('status', 'Profile successfully updated');
    }
    
    public function removePhoto()
    {
        $this->resetErrorBag();
        $user = User::find($this->state['id']);
        if($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
            session()->flash('status', 'Photo successfully removed');
            $this->emit('reload');
        } else {
            session()->flash('status', 'The user does not have a profile picture');
        }
    }
}
