<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedbackAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback_question_id',
        'participant_id',
        'feedback_option_id',
        'answer_text',
        'answer_number',
        'submitted_at',
    ];

    protected $casts = [
        'answer_number' => 'integer',
        'submitted_at' => 'datetime',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function question()
    {
        return $this->belongsTo(
            FeedbackQuestion::class,
            'feedback_question_id'
        );
    }

    public function option()
    {
        return $this->belongsTo(
            FeedbackOption::class,
            'feedback_option_id'
        );
    }
}