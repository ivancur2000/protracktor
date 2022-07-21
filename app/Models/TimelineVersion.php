<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TimelineVersion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'timeline_id',
        'name',
        'user_id_created'
    ];
    
    public function timeline() {
        return $this->belongsTo(Timeline::class);
    }

    public function event_versions_timeline_versions() {
        return $this->hasMany(EventVersionsTimelineVersion::class)->orderBy('order');
    }
    
    public function event_versions() {
        return $this->belongsToMany(EventVersion::class, 'event_versions_timeline_versions')->withPivot('order')->orderBy('event_versions_timeline_versions.order');
    }
    
    public function user_creator() {
        return $this->belongsTo(User::class, 'user_id_created');
    }

    public function user_modifier() {
        return $this->belongsTo(User::class, 'user_id_modified');
    }

    public function lastUpdated() {
        $date = $this->updated_at ?? $this->created_at;
        return Carbon::parse($date)->format('m/d/Y') . ' at ' . Carbon::parse($date)->format('h:i a');
    }

    public function lastUserUpdated() {
        $user = $this->user_modifier ?? $this->user_creator;
        return $user->name;
    }
}
