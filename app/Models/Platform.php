<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'status'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class)->withPivot('status', 'label', 'path', 'clicks');
    }
}
