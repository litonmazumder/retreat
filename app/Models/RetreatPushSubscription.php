<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetreatPushSubscription extends Model
{
    protected $fillable = [
        'participant_id',
        'endpoint',
        'endpoint_hash',
        'public_key',
        'auth_token',
        'content_encoding',
        'last_used_at',
        'disabled_at',
    ];

    protected function casts(): array
    {
        return [
            'last_used_at' => 'datetime',
            'disabled_at' => 'datetime',
        ];
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}