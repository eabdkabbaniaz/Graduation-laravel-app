<?php

namespace Modules\Student\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Experience\App\Models\Session;
use Modules\Student\Database\factories\StudentSessionReportFactory;

class StudentSessionReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded=[];
    protected $table="student_session_report";

    
    protected static function newFactory()
    {
        //return StudentSessionReportFactory::new();
    }
    protected function session(){
        return $this->belongsTo(Session::class);
    }
}
