<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Actions\Fortify\UpdateUserProfileInformation;

class ChangeEmail extends Component
{
    public $state = [];
 
    public function mount()
    {
        $this->state = auth()->user()->withoutRelations()->toArray();
    }

    public function render()
    {
        return view('livewire.user.change-email');
    }
    
    public function updateEmail(UpdateUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(auth()->user(), $this->state);

        session()->flash('status', 'Email successfully updated. You need to verify your email');
        $this->emit('saved');
    }
    
}
