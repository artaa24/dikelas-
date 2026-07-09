<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'classroom_id',
        'topic_id',
        'title',
        'description',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'mime_type',
        'sort_order',
        'download_count',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
