<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldUserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'about_me',
        'full_name',
        'profile_photo',
        'cover_photo',
        'cnic',
        'blood_group',
        'phone',
        'dob',
        'nationality',
        'gender',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
