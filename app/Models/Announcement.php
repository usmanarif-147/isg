<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'title',
        'message',
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'announcement_student', 'announcement_id', 'student_id')
            ->withPivot(
                'is_read',
                'read_at'
            )
            ->withTimestamps();
    }
}
