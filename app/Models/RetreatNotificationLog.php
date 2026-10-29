<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetreatNotificationLog extends Model
{
    protected $fillable = [
        'schedule_id',
        'notification_type',
        'unique_key',
        'scheduled_for',
        'status',
        'sent_at',
        'error_message',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_for' => 'datetime',
            'sent_at' => 'datetime',
        ];
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(RetreatSchedule::class, 'schedule_id');
    }
}