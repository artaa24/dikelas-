<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'student_id', 'classroom_id', 'issued_by', 'certificate_number',
        'title', 'description', 'type', 'final_score', 'issued_at'
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'final_score' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    /**
     * Generate unique certificate number.
     */
    public static function generateNumber(): string
    {
        $prefix = 'DK';
        $year = date('Y');
        $month = date('m');
        $count = self::whereYear('created_at', $year)->whereMonth('created_at', $month)->count() + 1;
        return sprintf('%s-%s%s-%04d', $prefix, $year, $month, $count);
    }
}
