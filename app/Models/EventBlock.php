<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBlock extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event_version_id', 
        'block_type', 
        'block_content', 
        'block_title', 
        'audience',
        'order',
        'user_id_created', 
    ];

    public function event_version() {
        return $this->belongsTo(EventVersion::class);
    }

}
