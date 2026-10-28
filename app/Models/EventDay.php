<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'day_number',
        'title',
        'event_date',
        'start_time',
        'end_time',
        'attendance_open_at',
        'attendance_pin',
        'feedback_open_at',
    ];

    protected $casts = [
        'event_date' => 'date',
        'attendance_open_at' => 'datetime',
        'feedback_open_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}