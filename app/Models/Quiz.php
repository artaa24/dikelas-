<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'classroom_id', 'title', 'description', 'duration_minutes', 
        'start_at', 'end_at', 'is_published', 'is_randomized', 
        'show_result', 'max_score'
    ];

    public function classroom() { return $this->belongsTo(Classroom::class); }
    public function questions() { return $this->hasMany(Question::class); }
    public function attempts() { return $this->hasMany(QuizAttempt::class); }
}
