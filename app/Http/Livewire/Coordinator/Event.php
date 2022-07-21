<?php

namespace App\Http\Livewire\Coordinator;

use Livewire\Component;

class Event extends Component
{
    public $description;
    public $mobile;
    
    public function render()
    {
        return view('livewire.coordinator.event');
    }
}
