<?php

namespace Modules\Student\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Student\Database\factories\TeacherFactory;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */  
     protected $guarded=[];
    // protected static function newFactory(): TeacherFactory
    // {
    //     //return TeacherFactory::new();
    // }
}
