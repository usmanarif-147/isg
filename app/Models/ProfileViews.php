<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'viewing_id',
        'viewer_id',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'latitude',
        'longitude',
    ];

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }
    public function viewingProfile()
    {
        return $this->belongsTo(User::class, 'viewing_id');
    }

    public function viewerUser()
    {
        return $this->belongsTo(User::class, 'viewer_id');
    }
}
