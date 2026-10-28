<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarnivalActivity extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'slug',
        'description',
        'instructions',
        'type',
        'facilitators',
        'image',
        'venue',
        'starts_at',
        'ends_at',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'instructions' => 'array',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(
            Participant::class,
            'carnival_eligibilities',
            'activity_id',
            'participant_id'
        )->withTimestamps();
    }

    public function facilitatorParticipants()
    {
        return $this->belongsToMany(
            \App\Models\Participant::class,
            'carnival_activity_facilitator',
            'activity_id',
            'participant_id'
        )->withPivot('wave')->withTimestamps();
    }

    public function facilitators()
    {
        return $this->belongsToMany(
            Participant::class,
            'carnival_activity_facilitator',
            'activity_id',
            'participant_id'
        )->withTimestamps();
    }

    public function assignedFacilitators(): BelongsToMany
    {
        return $this->belongsToMany(
            Participant::class,
            'carnival_activity_facilitator',
            'activity_id',
            'participant_id'
        );
    }
}