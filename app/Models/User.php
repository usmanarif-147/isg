<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'first_name',
        'last_name',
        'username',
        'name',
        'email',
        'role',
        'status',
        'roll_number',
        'photo',
        'is_social_platform_allowed',
        'password',
        'student_profile'
    ];

    protected $casts = [
        'student_profile' => 'array',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class)->withPivot('status', 'path', 'clicks');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'school_id');
    }

    public function school()
    {
        return $this->belongsTo(User::class, 'school_id');
    }

    public function template()
    {
        return $this->hasOne(Template::class, 'school_id');
    }

    public function rollNumberPrefix()
    {
        return $this->hasOne(RollNumberPrefix::class, 'school_id');
    }
}
