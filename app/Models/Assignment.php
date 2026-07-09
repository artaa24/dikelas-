<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'classroom_id',
        'title',
        'description',
        'max_score',
        'deadline_at',
        'is_published',
        'allow_late',
    ];

    protected $casts = [
        'deadline_at' => 'datetime',
        'is_published' => 'boolean',
        'allow_late'   => 'boolean',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
