<?php

namespace App\Http\Livewire\Communication\Timeline;

use Livewire\Component;
use App\Models\Timeline;
use App\Models\TimelineVersion;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimelineCreate extends Component
{
    public $events;
    public $selected_events;
    public $name;
    public $timeline;
    
    protected $listeners = [
        'updateEvents' => 'updateEvents'
    ];

    public function mount()
    {
        $this->events = Event::get()->where('is_deleted', false);
        $this->selected_events = new Collection();
    }

    public function render()
    {
        return view('livewire.communication.timeline.timeline-create');
    }
    
    public function updateEvents($source_ids, $selected_ids)
    {   
        $this->selected_events = new Collection();
        $this->events = new Collection();

        foreach ($source_ids as $id) {
            $id = intval($id);
            $event = Event::find($id);
            $this->events->push($event);
        }

        foreach ($selected_ids as $id) {
            $id = intval($id);
            $event = Event::find($id);
            $this->selected_events->push($event);
        }
        $this->checkEmpty();
    }

    public function submit() {
        if (!$this->timeline) {
            $this->store();
        } else {
            $this->update();
        }
    }

    public function store() {
        if (sizeof($this->selected_events) === 0) {
            session()->flash('error', 'You have not selected any event.');
            $this->emit('scrollUp');
            return;
        }

        DB::beginTransaction();
        try {
            $timeline = Timeline::create([
                'name' => $this->name, 
                'publish' => false, 
                'user_id_created' => auth()->user()->id
            ]);
            $timelineVersion = TimelineVersion::create([
                'timeline_id' => $timeline->id, 
                'name' => '1', 
                'user_id_created' => auth()->user()->id, 
            ]);
            $timeline->update(['timeline_version_id' => $timelineVersion->id]);

            if ($this->selected_events) {
                $array_event_versions = array();
                foreach ($this->selected_events as $index => $selected_event){
                    $array_event_versions[$selected_event->event_version_id] = [
                        'enabled' => true,
                        'order' => ($index + 1),
                        'created_at' => Carbon::now(),
                    ];
                }
                $timelineVersion->event_versions()->attach($array_event_versions);
            }
            DB::commit();
            $this->timeline = $timeline;
            session()->flash('success', 'The Timeline was successfully registered. Please publish any version');
            $this->emit('scrollUp');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', 'The timeline was not successfully registered');
        }
    }
    
    public function update()
    {
        DB::beginTransaction();
        try {
            $this->timeline->update([
                'name' => $this->name, 
                'user_id_modified' => auth()->user()->id,
                'publish' => false,
                'published_at' => null,
            ]);

            $newVersion = intval($this->timeline->last_version->name) + 1;

            $timelineVersion = TimelineVersion::create([
                'timeline_id' => $this->timeline->id, 
                'name' => $newVersion, 
                'user_id_created' => auth()->user()->id, 
            ]);
            $this->timeline->update(['timeline_version_id' => $timelineVersion->id]);
            
            if ($this->selected_events) {
                $array_event_versions = array();
                foreach ($this->selected_events as $index => $selected_event){
                    $array_event_versions[$selected_event->event_version_id] = [
                        'enabled' => true,
                        'order' => ($index + 1),
                        'created_at' => Carbon::now(),
                    ];
                }
                $timelineVersion->event_versions()->attach($array_event_versions);
            }
            DB::commit();

            $this->timeline = Timeline::find($this->timeline->id);
            session()->flash('success', 'The Timeline was successfully updated. Please publish any version');
            $this->emit('scrollUp');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', 'The timeline was not successfully updated');
        }
    }

    private function checkEmpty()
    {
        if (sizeof($this->selected_events) === 0) {
            $this->emit('empty');
        }
    }

    public function publish($timeline_version_id)
    {
        $this->timeline->update([
            'publish' => true,
            'published_at' => Carbon::now(),
            'timeline_version_id' => $timeline_version_id
        ]);

        $timeline_version = TimelineVersion::find($timeline_version_id);
        $selected_events = $timeline_version->event_versions->map(function ($event_version, $key) {
            return $event_version->event_id;
        });

        $events = Event::get()->map(function($event) {
            return $event->id;
        });

        $this->updateEvents(array_diff($events->all(), $selected_events->all()), $selected_events->all());
        session()->flash('success', 'The timeline was successfully published.');
        $this->emit('scrollUp');
    }
}
