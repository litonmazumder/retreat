<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Participant extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipantFactory> */
    use HasFactory;

    protected $fillable = [

            'event_id',

            'uuid',

            'first_name',

            'last_name',

            'email',

            'designation',

            'project_name',

            'region',
            
            'profile_confirmed',

            'status'

        ];

    protected static function booted(): void
    {
        static::creating(function (Participant $participant) {
            if (empty($participant->uuid)) {
                $participant->uuid = (string) Str::uuid();
            }
        });
    }
    
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function otps()
    {
        return $this->hasMany(ParticipantOtp::class);
    }

    public function carnivalActivities()
    {
        return $this->belongsToMany(
            \App\Models\CarnivalActivity::class,
            'carnival_eligibilities',
            'participant_id',
            'activity_id'
        )->withPivot(['wave', 'start_time', 'end_time'])->withTimestamps();
    }

    public function facilitatedActivities()
    {
        return $this->belongsToMany(
            \App\Models\CarnivalActivity::class,
            'carnival_activity_facilitator',
            'participant_id',
            'activity_id'
        )->withTimestamps();
    }

}
