<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetreatRechargeClaim extends Model
{
    protected $fillable = [
        'participant_id',
        'schedule_id',
        'points',
        'claim_rank',
        'claimed_at',
    ];

    protected function casts(): array
    {
        return [
            'points' => 'integer',
            'claim_rank' => 'integer',
            'claimed_at' => 'datetime',
        ];
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(RetreatSchedule::class, 'schedule_id');
    }
}