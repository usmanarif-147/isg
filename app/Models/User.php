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
        'clicks',
        'terms_accepted',
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

    public function cards()
    {
        return $this->hasMany(StudentCard::class, 'school_id');
    }

    public function studentCard()
    {
        return $this->hasOne(StudentCard::class, 'student_id');
    }

    public function cardsHistory()
    {
        return $this->hasMany(StudentCardHistory::class, 'school_id');
    }

    public function studentCardHistory()
    {
        return $this->hasOne(StudentCardHistory::class, 'student_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'school_id');
    }

    public function studentAnnouncements()
    {
        return $this->belongsToMany(User::class, 'announcement_student', 'announcement_id', 'student_id')
            ->withPivot(
                'is_read',
                'read_at'
            )
            ->withTimestamps();
    }
}
