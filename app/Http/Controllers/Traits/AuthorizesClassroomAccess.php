<?php

namespace App\Http\Controllers\Traits;

use App\Models\Classroom;
use Illuminate\Http\Request;

trait AuthorizesClassroomAccess
{
    /**
     * Cek apakah user memiliki akses ke kelas (guru pemilik atau murid terdaftar).
     */
    protected function authorizeClassroomAccess(Classroom $classroom): bool
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isTeacher()) {
            return $classroom->teacher_id === $user->id;
        }

        if ($user->isStudent()) {
            return $classroom->students()->where('users.id', $user->id)->exists();
        }

        return false;
    }

    /**
     * Cek akses ke kelas, abort 403 jika tidak memiliki akses.
     */
    protected function ensureClassroomAccess(Classroom $classroom): void
    {
        if (!$this->authorizeClassroomAccess($classroom)) {
            abort(403, 'Anda tidak memiliki akses ke kelas ini.');
        }
    }

    /**
     * Cek apakah user adalah guru pemilik kelas.
     */
    protected function isClassroomOwner(Classroom $classroom): bool
    {
        return auth()->user()->id === $classroom->teacher_id;
    }

    /**
     * Ensure user adalah guru pemilik kelas.
     */
    protected function ensureClassroomOwner(Classroom $classroom): void
    {
        if (!$this->isClassroomOwner($classroom)) {
            abort(403, 'Hanya guru pemilik kelas yang dapat melakukan aksi ini.');
        }
    }

    /**
     * Cek apakah user adalah murid yang terdaftar di kelas.
     */
    protected function isClassroomStudent(Classroom $classroom): bool
    {
        return $classroom->students()->where('users.id', auth()->id())->exists();
    }

    /**
     * Ensure user adalah murid terdaftar di kelas.
     */
    protected function ensureClassroomStudent(Classroom $classroom): void
    {
        if (!$this->isClassroomStudent($classroom)) {
            abort(403, 'Anda tidak terdaftar di kelas ini.');
        }
    }
}
