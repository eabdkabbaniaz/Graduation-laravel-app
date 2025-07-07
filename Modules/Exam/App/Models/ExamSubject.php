<?php

namespace Modules\Exam\App\Models;
use  Modules\Exam\App\Models\Subject;
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
    
    public function subjects()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

}
