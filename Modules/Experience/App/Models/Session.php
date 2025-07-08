<?php

namespace Modules\Experience\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\Database\factories\SessionFactory;

class Session extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
 

    protected $fillable = ['name', 'mark','code', 'experience_id', 'teacher_id','status'];

    public function experiences()
    {
        return $this->belongsTo(ExperienceSemester::class ,'experience_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_sessions');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'session_users')
                    ->withPivot('mark')
                    ->withTimestamps();
    }
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
}