<?php

namespace App\Http\Livewire\Communication\Timeline;

use App\Models\TimelineVersion;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TimelineEdit extends Component
{
    public $timeline;
    public $event_versions_timeline_versions;
    public $sort_ids;
    public $listeners = ['updateSort' => 'updateSort'];

    public function render()
    {
        return view('livewire.communication.timeline.timeline-edit');
    }

    public function mount()
    {
        $this->event_versions_timeline_versions = $this->timeline->last_version->event_versions_timeline_versions;
    }

    public function updateSort($sort_data)
    {
        $new_sort = new Collection();
        foreach ($sort_data as $sort => $id) {
            $event_versions_timeline_version = $this->event_versions_timeline_versions->filter(function($item) use ($id) {
                return $item->event_version->id === intval($id);
            })->first();
            $new_sort->push($event_versions_timeline_version);
        }
        $this->event_versions_timeline_versions = $new_sort;
        $this->sort_ids = $sort_data;
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $this->timeline->update([
                'user_id_modified' => auth()->user()->id
            ]);

            $new_version = intval($this->timeline->last_version->name) + 1;

            $timeline_version = TimelineVersion::create([
                'timeline_id' => $this->timeline->id, 
                'name' => $new_version, 
                'user_id_created' => auth()->user()->id, 
            ]);
            $this->timeline->update(['timeline_version_id' => $timeline_version->id]);

            if ($this->sort_ids){
                $array_event_versions = array();
                foreach ($this->sort_ids as $sort => $id){
                    $array_event_versions[$id] = [
                        'enabled' => true,
                        'order' => ($sort + 1),
                        'created_at' => Carbon::now(),
                    ];
                }
                $timeline_version->event_versions()->attach($array_event_versions);
            }
            DB::commit();

            session()->flash('success', 'Timeline successfully updated.');
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->flash('error', 'Timeline successfully updated.');
        }
    }
}
