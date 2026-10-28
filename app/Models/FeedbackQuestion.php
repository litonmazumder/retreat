<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    public function feedback()
{
    return $this->belongsTo(Feedback::class);
}

public function options()
{
    return $this->hasMany(FeedbackOption::class)
        ->orderBy('sort_order');
}

public function answers()
{
    return $this->hasMany(
        FeedbackAnswer::class,
        'feedback_question_id'
    );
}
}
