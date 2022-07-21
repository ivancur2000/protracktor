<?php

namespace App\Http\Livewire\Communication\Event;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class EventIndex extends Component
{
    public $events;

    public function mount() 
    {
        $this->events = Event::get()->where('is_deleted', false);
    }
    
    public function render()
    {
        return view('livewire.communication.event.event-index');
    }

    public function delete($id) {
        $event = Event::find($id);
        $event->is_deleted = true;
        $event->deleted_at = Carbon::now();
        $event->user_id_deleted = auth()->user()->id;
        $event->save();
        session()->flash('status', 'Event successfully deleted.');
        $this->mount();
    }

    public function addSMS($id) {
        $event = Event::find($id);
        $event->sms = true;
        $event->user_id_modified = auth()->user()->id;
        $event->save();
        session()->flash('status', 'SMS successfully added.');
        $this->mount();
    }

    public function removeSMS($id)
    {
        $event = Event::find($id);
        $event->sms = false;
        $event->user_id_modified = auth()->user()->id;
        $event->save();
        session()->flash('status', 'SMS successfully removed.');
        $this->mount();
    }

    public function unpublish($id)
    {
        $event = Event::find($id);
        $event->event_version_id = null;
        $event->user_id_modified = auth()->user()->id;
        $event->save();
        session()->flash('status', 'Unplished successfully.');
        $this->mount();
    }
}
