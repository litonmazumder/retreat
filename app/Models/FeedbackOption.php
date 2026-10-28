<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackOption extends Model
{
    public function question()
    {
        return $this->belongsTo(FeedbackQuestion::class);
    }
}
