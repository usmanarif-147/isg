<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'front_side',
        'back_side'
    ];

    protected $casts = [
        'front_side' => 'array',
        'back_side' => 'array'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
