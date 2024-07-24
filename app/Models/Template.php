<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'logo',
        'front_side',
        'back_side'
    ];

    protected $casts = [
        'front_side' => 'array',
        'back_side' => 'array'
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }
}
