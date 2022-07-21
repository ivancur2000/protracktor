<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Session extends Model
{
    use HasFactory;

    public function getLastLoginDateAttribute() {
        $date = Carbon::createFromTimestamp($this->last_activity);
        return $date->format('m/d/Y') . ' at ' . $date->format('h:i a');
    }
}
