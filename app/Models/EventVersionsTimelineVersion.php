<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVersionsTimelineVersion extends Model
{
    use HasFactory;
    
    public function event_version() {
        return $this->belongsTo(EventVersion::class);
    }

    public function timeline_version() {
        return $this->belongsTo(TimelineVersion::class);
    }
}
