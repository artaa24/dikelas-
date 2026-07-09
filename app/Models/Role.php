<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'display_name', 'description', 'level'])]
class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
