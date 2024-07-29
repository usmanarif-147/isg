<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
        'message',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
