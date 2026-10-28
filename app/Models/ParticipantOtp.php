<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantOtp extends Model
{
    protected $fillable = [
        'participant_id',
        'otp_hash',
        'expires_at',
        'verified_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }

    public function isVerified(): bool
    {
        return ! is_null($this->verified_at);
    }
}