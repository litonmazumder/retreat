<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedbackPresentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback_id',
        'current_question_id',
        'status',
        'show_results',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'show_results' => 'boolean',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function currentQuestion()
    {
        return $this->belongsTo(
            FeedbackQuestion::class,
            'current_question_id'
        );
    }
}