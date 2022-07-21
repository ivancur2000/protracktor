<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use App\Models\Timeline;
use App\Models\TimelineVersion;
use App\Http\Requests\TimelineRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimelineController extends Controller
{   
    public function index()
    {
        $timelines = Timeline::get()->where('publish', 1);
        return view('communication.timeline.index', compact('timelines'));
    }

    public function create() 
    {
        if (Timeline::get()->where('publish', 1)->count()) {
            return back()->with('success', 'There is already a timeline created');
        }
        return view('communication.timeline.create');
    }

    public function edit(Timeline $timeline) 
    {
        session(['link' => request()->path()]);
        return view('communication.timeline.edit', compact('timeline'));
    }

    public function update(TimelineRequest $request, Timeline $timeline)
    {
        DB::beginTransaction();
        try {
            $timeline->update([
                'name' => $request->name, 
                'user_id_modified' => auth()->user()->id,
                'publish' => false,
                'published_at' => null,
            ]);

            $version = explode(".", $timeline->last_version->name);
            $majorVersion = intval($version[0]);
            $majorVersion++;

            $timelineVersion = TimelineVersion::create([
                'timeline_id' => $timeline->id, 
                'name' => $majorVersion, 
                'user_id_created' => auth()->user()->id, 
            ]);
            $timeline->update(['timeline_version_id' => $timelineVersion->id]);
            
            if($request->event_versions){
                $array_event_versions = array();
                foreach ($request->event_versions as $index => $item){
                    $array_event_versions[$item] = [
                        'enabled' => true,
                        'order' => ($index + 1),
                        'created_at' => Carbon::now(),
                    ];
                }
                $timelineVersion->event_versions()->attach($array_event_versions);
            }
            DB::commit();
            return redirect()->route('communication.timeline.edit', ['timeline' => $timeline])->with('success', 'The Timeline was successfully registered');
            //return redirect()->route('communication')->with('success', 'The Timeline was successfully updated');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The timeline was not successfully updated');
        }
    }
    
    public function publish(Timeline $timeline, TimelineVersion $timelineVersion) 
    {
        $timeline->update([
            'publish' => true,
            'published_at' => Carbon::now(),
            'timeline_version_id' => $timelineVersion->id
        ]);
        return back()->withInput()->with('success', 'The timeline was successfully published');
    }

}