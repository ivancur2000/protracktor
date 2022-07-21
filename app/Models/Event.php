<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'sms', 
        'preview',
        'edit', 
        'config',
        'user_id_created',
        'event_version_id'
    ];

    public function event_versions() {
        return $this->hasMany(EventVersion::class);
    }
    
    public function active_version() {
        return $this->hasOne(EventVersion::class, 'id', 'event_version_id');
    }

    public function user_creator() {
        return $this->belongsTo(User::class, 'id', 'user_id_created');
    }

    public function user_modifier() {
        return $this->belongsTo(User::class, 'id', 'user_id_modified');
    }

    public function last_user_modifier() {
        if ($this->user_id_modified) {
            return $this->belongsTo(User::class, 'user_id_modified');
        }
        return $this->belongsTo(User::class, 'user_id_created');
    }

    public function getLastUpdatedAtAttribute() {
        if ($this->updated_at) {
            return $this->updated_at->format('m/d/Y') . ' at ' . $this->updated_at->format('h:i a');
        }
        return $this->created_at->format('m/d/Y') . ' at ' . $this->created_at->format('h:i a');
    }
}
