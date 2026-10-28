<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'event_id',
        'event_day_id',
        'title',
        'description',
        'status',
        'starts_at',
        'ends_at',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }

    public function questions()
    {
        return $this->hasMany(FeedbackQuestion::class)
            ->orderBy('sort_order');
    }

    public function presentation()
    {
        return $this->hasOne(FeedbackPresentation::class);
    }

    public function answers()
{
    return $this->hasManyThrough(
        FeedbackAnswer::class,
        FeedbackQuestion::class,
        'feedback_id',
        'feedback_question_id',
        'id',
        'id'
    );
}
}