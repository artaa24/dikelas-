<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    protected $fillable = [
        'file_name', 'file_path', 'file_size', 'status', 'type', 'created_by', 'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
