<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [

        'title',

        'slug',

        'description',

        'venue',

        'timezone',

        'registration_start',

        'registration_end',

        'event_start',

        'event_end',

        'status',

        'is_registration_open',

    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function eventDays()
    {
        return $this->hasMany(EventDay::class)
            ->orderBy('day_number');
    }
}
