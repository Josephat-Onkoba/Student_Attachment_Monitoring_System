<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'reg_no',
        'password',
    ];
    public function scopeUserType4($query)
    {
        return $query->where('user_type', 4);
    }

    public function attachments()
    {
        return $this->hasMany(AttachmentModel::class, 'user_id');
    }

    public function supervisedStudents()
    {
        return $this->belongsToMany(User::class, 'staff_student', 'staff_id', 'student_id')
                    ->withPivot('allocation_date');
    }

    public function supervisingStaff()
    {
        return $this->belongsToMany(User::class, 'staff_student', 'student_id', 'staff_id')
                    ->withPivot('allocation_date');
    }

    public function hasReachedMaxStudents()
    {
        $studentCount = DB::table('staff_student')
            ->where('staff_id', $this->id)
            ->count();

        return $studentCount >= 5;
    }


        public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function attachment()
    {
        return $this->hasOne(AttachmentModel::class); // Use hasMany if a user can have multiple attachments
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
        'first_login_at' => 'datetime',
    ];

    static public function getEmailSingle($email)
    {
        return self::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return self::where('remember_token', '=',$remember_token)->first();
    }
}