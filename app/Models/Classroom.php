<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'semester_id',
        'name',
        'code',
        'description',
        'cover_image',
        'is_active',
        'max_students',
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'classroom_student', 'classroom_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    /**
     * Cek apakah kelas sudah penuh.
     */
    public function isFull(): bool
    {
        if (is_null($this->max_students)) {
            return false; // Tidak ada batas
        }
        return $this->students()->count() >= $this->max_students;
    }
}
