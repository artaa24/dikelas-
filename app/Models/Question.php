<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id', 'type', 'content', 'answer_key', 'points', 'sort_order'
    ];

    public function quiz() { return $this->belongsTo(Quiz::class); }
    public function options() { return $this->hasMany(QuestionOption::class); }
}
