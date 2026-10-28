<?php

namespace App\Models;
use App\Models\Participant;
use App\Models\Event;
use App\Models\Presentation;

use Illuminate\Database\Eloquent\Model;

class EventSession extends Model
{
    protected $table = 'event_sessions';


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function presentation()
    {
        return $this->hasOne(Presentation::class);
    }

}