<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RetreatSchedule extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'subtitle',
        'description',
        'schedule_date',
        'start_time',
        'end_time',
        'venue',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'schedule_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
