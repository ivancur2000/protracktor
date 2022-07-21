<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'publish', 
        'published_at', 
        'user_id_created',
        'timeline_version_id',
        'user_id_modified'
    ];

    public function timeline_versions() {
        return $this->hasMany(TimelineVersion::class)->orderBy('name', 'desc');
    }

    public function version_active() {
        return $this->hasOne(TimelineVersion::class, 'id', 'timeline_version_id');
    }

    public function last_version() {
        return $this->hasOne(TimelineVersion::class)->orderBy('name', 'desc');
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
    
}
