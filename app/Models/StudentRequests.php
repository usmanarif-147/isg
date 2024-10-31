<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
        'card_id',
        'request_type',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
