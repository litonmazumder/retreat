<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [

    'participant_id',

    'day',

    'checked_in_at',

];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

}
