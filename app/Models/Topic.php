<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['classroom_id', 'name', 'description', 'sort_order'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class)->orderBy('sort_order');
    }
}
