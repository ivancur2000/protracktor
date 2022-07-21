<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EventVersion extends Model
{
    use HasFactory;
    private const BG_BLOCK = 1;
    private const LOGO_BLOCK = 2;
    private const TEXT_BLOCK = 3;
    private const TITLE_BLOCK = 5;
    private const SUBTITLE_BLOCK = 6;

    protected $fillable = [
        'event_id',
        'name',
        'user_id_created'
    ];
    
    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function event_blocks() {
        return $this->hasMany(EventBlock::class);
    }

    public function getBgBlockImageAttribute() {
        $bg_block = $this->event_blocks()->where('block_type', self::BG_BLOCK)->first();
        if ($bg_block) {
            return url("storage/$bg_block->block_content");
        } else {
            return '';
        }
    }
    
    public function getLogoBlockImageAttribute() {
        $logo_block = $this->event_blocks()->where('block_type', self::LOGO_BLOCK)->first();
        if ($logo_block) {
            return url("storage/$logo_block->block_content");
        } else {
            return '';
        }
    }

    public function getTitleBlockAttribute() {
        $title_block = $this->event_blocks()->where('block_type', self::TITLE_BLOCK)->first();
        if ($title_block) {
            return $title_block->block_content;
        } else {
            return '';
        }
    }

    public function getSubtitleBlockAttribute() {
        $subtitle_block = $this->event_blocks()->where('block_type', self::SUBTITLE_BLOCK)->first();
        if ($subtitle_block) {
            return $subtitle_block->block_content;
        } else {
            return '';
        }
    }

    public function text_blocks() {
        return $this->event_blocks()->where('block_type', 3)->orderBy('order', 'asc');
    }

    public function event_versions_timeline_versions() {
        return $this->hasMany(EventVersionsTimelineVersion::class);
    }
    
    public function timeline_versions() {
        return $this->belongsToMany(TimelineVersion::class, 'event_versions_timeline_versions');
    }
    
    public function user_creator() {
        return $this->belongsTo(User::class, 'user_id_created');
    }
    
    public function getCreatedAtFormatedAttribute() {
        return Carbon::parse($this->created_at)->format('M d, Y') . ' @' . Carbon::parse($this->created_at)->format('h:i a');
    }
}
