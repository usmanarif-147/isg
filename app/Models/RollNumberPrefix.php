<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RollNumberPrefix extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'prefix'
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }
}
