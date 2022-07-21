<?php

namespace App\Http\Controllers\Communication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventVersion;
use App\Models\EventBlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{   
    public function index()
    {
        return view('communication.event.index');
    }

    public function show(Event $event)
    {
        switch($event->id) {
            case 1: 
                $template = 'communication.event.emails.introduction';
                $title = 'Welcome Home!';
                $subtitle = 'Welcome to Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-1.png';
                $team_intro = 'Meet the Closing Team';
                break;
            case 2:
                $template = 'communication.event.emails.required-disclosures';
                $title = 'Required Disclosures';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-2.png';
                $team_intro = 'Questions? Contact the Closing Team';
                break;
            case 3:
                $template = 'communication.event.emails.consumer-awareness';
                $title = 'Consumer Awareness';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-3.png';
                $team_intro = 'Questions? Contact the Closing Team';
                break;
            case 4:
                $template = 'communication.event.emails.commitment-delivery';
                $title = 'Commitment Delivery';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-4.png';
                $team_intro = 'Questions? Contact the Closing Team';
                break;
            case 5:
                $template = 'communication.event.emails.seller-affadavit';
                $title = 'Seller Affadavit';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-5.png';
                $team_intro = 'Questions? Contact the Closing Team';                
                break;
            case 6:
                $template = 'communication.event.emails.closing-notice';
                $title = 'Closing Notice';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-6.png';
                $team_intro = 'Questions? Contact the Closing Team';
                break;
            case 7:
                $template = 'communication.event.emails.signing-reminder';
                $title = 'Signing Reminder';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-7.png';
                $team_intro = 'Questions? Contact the Closing Team';                
                break;
            case 8:
                $template = 'communication.event.emails.wire-confirmation';            
                $title = 'Wire Confirmation';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-8.png';
                $team_intro = 'Questions? Contact the Closing Team';                
                break;
            case 9:
                $template = 'communication.event.emails.congratulations';
                $title = 'Congratulation';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-9.png';
                $team_intro = 'Questions? Contact the Closing Team';                
                break;
            case 10:
                $template = 'communication.event.emails.final-policy';
                $title = 'Final Policy';
                $subtitle = 'Trademark Title';
                $logo = '/assets/media/event-show/home.png';
                $image = '/assets/media/event-show/image-lg-10.png';
                $team_intro = 'Questions? Contact the Closing Team';                
               
                break;
        }
        return view('communication.event.show', compact('event', 'template', 'title', 'subtitle', 'logo', 'image', 'team_intro'));
    }

    public function create()
    {
        return view('communication.event.create');
    }

    public function store(EventRequest $request)
    {
        DB::beginTransaction();
        try {
            $event = Event::create([
                'user_id_created' => auth()->user()->id,
                'preview' => true,
                'edit' => true,
                'config' => true,
            ] + $request->all());
    
            $eventVersion = EventVersion::create([
                'event_id' => $event->id, 
                'name' => '1', 
                'user_id_created' => auth()->user()->id, 
            ]);
            $event->update(['event_version_id' => $eventVersion->id]);

            DB::commit();

            if (session('link')) {
                return redirect(session('link'))->with('success', 'Event created successfully');
            }
            return redirect()->route('communication.timeline.create')->with('success', 'Event created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The event was not successfully registered');
        }
    }

    public function edit(Event $event)
    {
        return view('communication.event.edit', compact('event'));
    }

    public function update(EventVersion $event_version, Request $request)
    {   
        DB::beginTransaction();
        try {
            foreach ($request->block_id as $index => $block_id) {
                $event_block = EventBlock::find($block_id);
                $event_block->update([
                    'order' => ($index + 1)
                ]);
            }
            DB::commit();
            
            return back()->with('success', 'Event saved successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The event was not saved successfully created');
        }
    }

    public function setBlockBg(EventVersion $event_version, Request $request)
    {
        $bg_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 1
        ])->first();
        if ($bg_block) {
            if ($request->file('file')) {
                Storage::disk('public')->delete($bg_block->block_content);
                $bg_block->block_content = $request->file('file')->store('backgrounds', 'public');
                $bg_block->update();
            }
        } else {
            $event_block = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 1,
                'block_title' => 'Background',
                'block_content' => '',
                'user_id_created' => auth()->user()->id
            ]);
            if ($request->file('file')) {
                $event_block->block_content = $request->file('file')->store('backgrounds', 'public');
                $event_block->save();
            }
        }
        return back()->with('success', 'Background Block set successfully');
    }

    public function setBlockLogo(EventVersion $event_version, Request $request)
    {
        $logo_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 2
        ])->first();
        if ($logo_block) {
            if ($request->file('file')) {
                Storage::disk('public')->delete($logo_block->block_content);
                $logo_block->block_content = $request->file('file')->store('logos', 'public');
                $logo_block->update();
            }
        } else {
            $event_block = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 2,
                'block_title' => 'Logo',
                'block_content' => '',
                'user_id_created' => auth()->user()->id
            ]);
            if ($request->file('file')) {
                $event_block->block_content = $request->file('file')->store('logos', 'public');
                $event_block->save();
            }
        }
        return back()->with('success', 'Logo Block set successfully');
    }

    public function createBlock(EventVersion $event_version, Request $request) 
    {
        DB::beginTransaction();
        try {
            $last = EventBlock::where('event_version_id', $event_version->id)
                ->orderBy('order', 'desc')
                ->first();
            if ($last) {
                $nextOrder = $last->order + 1;
            } else {
                $nextOrder = 1;
            }
            $eventBlock = EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => '3',
                'order' => $nextOrder,
                'user_id_created' => auth()->user()->id
            ] + $request->all());
            DB::commit();
            
            return back()->with('success', 'Block created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withInput()->with('error', 'The block was not successfully created');
        }
    }

    public function editBlock(EventVersion $event_version, Request $request) 
    {
        $event_block = EventBlock::find($request->block_id);
        $event_block->update($request->all());
        return back()->with('success', 'Block updated successfully');
    }

    public function setBlockSign(EventVersion $event_version, Request $request)
    {
        $sign_block = EventBlock::where([
            'event_version_id' => $event_version->id,
            'block_type' => 4
        ])->first();
        if ($sign_block) {
            $sign_block->update([
                'block_content' => $request->block_content
            ]);
        } else {
            EventBlock::create([
                'event_version_id' => $event_version->id,
                'block_type' => 4,
                'block_content' => $request->block_content,
                'block_title' => 'Sign',
                'user_id_created' => auth()->user()->id
            ]);
        }
        return back()->with('success', 'Sign Block set successfully');
    }

    public function selectVersion(Event $event)
    {
        return view('communication.event.select-version', compact('event'));
    }
}