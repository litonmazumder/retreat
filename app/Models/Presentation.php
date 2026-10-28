<?php

namespace App\Models;
use App\Models\EventSession;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    
    protected $fillable = [
        'event_session_id',

        'file_name',
    ];

    public function eventSession()
    {
        return $this->belongsTo(EventSession::class, 'event_session_id');
    }
}
