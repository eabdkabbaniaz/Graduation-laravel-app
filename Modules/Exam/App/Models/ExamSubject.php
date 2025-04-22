<?php

namespace Modules\Exam\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\factories\ExamSubjectFactory;

class ExamSubject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];
    

}
