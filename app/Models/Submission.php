<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'assignment_id',
        'student_id',
        'file_path',
        'file_name',
        'file_size',
        'note',
        'status',
        'score',
        'feedback',
        'graded_at',
        'submitted_at',
    ];

    protected $casts = [
        'graded_at'    => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
