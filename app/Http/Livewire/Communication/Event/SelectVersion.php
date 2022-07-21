<?php

namespace App\Http\Livewire\Communication\Event;

use Livewire\Component;
use App\Models\EventVersion;

class SelectVersion extends Component
{
    public $event;
    public $event_version_id_selected;
    public $event_version_selected;
    public $status;

    protected $listeners = ['selectVersion' => 'selectVersion'];

    public function mount() 
    {
        $this->event_version_id_selected = $this->event->event_version_id;
        $this->event_version_selected = $this->event->active_version;
    }

    public function render()
    {
        return view('livewire.communication.event.select-version');
    }

    public function selectVersion()
    {
        $this->status = "";
        $this->event_version_selected = EventVersion::find($this->event_version_id_selected);
        $this->emit('fadeInPreview');
    }

    public function setCurrentVersion() 
    {
        $this->status = "";
        $this->emit('fadeOutPreview');
        if ($this->event_version_id_selected !== $this->event->event_version_id) {
            $this->event_version_id_selected = $this->event->event_version_id;
        }
    }

    public function restoreVersion()
    {
        $this->event->event_version_id = $this->event_version_id_selected;
        $this->event->user_id_modified = auth()->user()->id;
        $this->event->update();
        $this->status = "OK";
        $this->emit('scrollUp');
    }
}
