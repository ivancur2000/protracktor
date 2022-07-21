<?php

namespace App\Http\Livewire\Communication\Event;

use Livewire\Component;
use App\Models\EventBlock;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\SettingRepository;

class EventEdit extends Component
{
    private const TEXT_BLOCK = 3;
    private const TITLE_BLOCK = 5;
    private const SUBTITLE_BLOCK = 6;
    public $event;
    public $event_id;
    public $block_id_selected;
    public $audience;

    public function render()
    {
        $this->event = Event::find(1);
        return view('livewire.communication.event.event-edit');
    }

    public function mount() 
    {
        $this->audience = (new SettingRepository())->getAudienceDefault();
    }

    public function setTitleBlock($text)
    {
        $title_block = EventBlock::where([
            'event_version_id' => $this->event->active_version->id,
            'block_type' => self::TITLE_BLOCK
        ])->first();
        if ($title_block) {
            $title_block->block_content = $text;
            $title_block->update();
        } else {
            EventBlock::create([
                'event_version_id' => $this->event->active_version->id,
                'block_type' => self::TITLE_BLOCK,
                'block_title' => 'Title',
                'block_content' => $text,
                'user_id_created' => auth()->user()->id
            ]);
        }
        session()->flash('success', 'Title Block set successfully.');
    }

    public function setSubtitleBlock($text)
    {
        $subtitle_block = EventBlock::where([
            'event_version_id' => $this->event->active_version->id,
            'block_type' => self::SUBTITLE_BLOCK
        ])->first();
        if ($subtitle_block) {
            $subtitle_block->block_content = $text;
            $subtitle_block->update();
        } else {
            EventBlock::create([
                'event_version_id' => $this->event->active_version->id,
                'block_type' => self::SUBTITLE_BLOCK,
                'block_title' => 'Subtitle',
                'block_content' => $text,
                'user_id_created' => auth()->user()->id
            ]);
        }
        session()->flash('success', 'Subtitle Block set successfully.');
    }

    public function createBlock($block_text, $block_name)
    {
        DB::beginTransaction();
        try {
            $last = EventBlock::where('event_version_id', $this->event->active_version->id)
                ->orderBy('order', 'desc')
                ->first();
            if ($last) {
                $nextOrder = $last->order + 1;
            } else {
                $nextOrder = 1;
            }
            EventBlock::create([
                'event_version_id' => $this->event->active_version->id,
                'block_type' => self::TEXT_BLOCK,
                'audience' => json_encode($this->audience),
                'order' => $nextOrder,
                'user_id_created' => auth()->user()->id,
                'block_content' => $block_text,
                'block_title' => $block_name
            ]);
            DB::commit();
            
            session()->flash('success', 'Block created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->flash('error', 'The block was not successfully created');
        }
    }

    public function updateBlock($block_text, $block_name, $id) 
    {
        $event_block = EventBlock::find($id);
        $event_block->block_content = $block_text;
        $event_block->block_title = $block_name;
        $event_block->audience = json_encode($this->audience);
        $event_block->update();
        session()->flash('success', 'Block updated successfully');
    }

    public function updateSort($items)
    {
        foreach ($items as $item) {
            $event_block = EventBlock::find($item['value']);
            $event_block->order = $item['order'];
            $event_block->update();
        }
        session()->flash('success', 'The order was saved successfully');
    }

    public function editBlock($id) {
        $block_selected = EventBlock::find($id);
        $this->block_id_selected = $id;
        $this->block_title_selected = $block_selected->block_title;
        $this->audience = json_decode($block_selected->audience, true);

        $this->emit('showModalForEdit');
    }
}
