<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Exam\App\Models\ExamUser;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\UserSession;
use Modules\Student\App\Models\Category;
use Modules\Student\App\Models\Student;
use Modules\Student\App\Models\StudentSessionReport;
use Modules\Student\App\Models\Teacher;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function students(){
        return $this->hasOne(Student::class);
    }
    public function teacher(){
        return $this->hasOne(Teacher::class);
    }
    public function sessions(){
        return $this->hasMany(UserSession::class);
    }
public function sessionsReport(){
        return $this->hasMany(UserSession::class,'user_id');
    }

    // public function attendances(){
    //     return $this->hasMany(UserSession::class);
    // }
    public function exam(){
        return $this->hasMany(ExamUser::class);
    }
      public function category(){
        return $this->belongsToMany(Category::class,'students');
    }

}
