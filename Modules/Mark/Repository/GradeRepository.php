<?php
namespace Modules\Mark\Repository;

use App\Models\User;
use Modules\Exam\App\Models\Exam;
use Modules\Exam\App\Models\ExamUser;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\UserSession;
use Modules\Mark\App\Models\Setting;
use Modules\Student\App\Models\Student;

class GradeRepository
{
    public function getStudentGrades($userId)
    {
        return Student::where('user_id',$userId)->first();
       
    }

    public function getAllStudentsGrades()
    {
        return Student::with(['user:id,name,email'])->get(['id', 'user_id', 'exam_score', 'assessment_score', 'attendance_average', 'final_grade']);
    }

    public function getSettings()
    {
        return Setting::all();
    }

    public function updateSettings($data)
    {          $setting= Setting::find($data['id']);
         $calculation_method=$data['calculation_method'];
         $setting->calculation_method =$calculation_method;
    
         $setting->save();
      
        return ['message' => 'تم تحديث إعدادات الحساب بنجاح',$setting];
    }
    public function getDetailedStats($userId)
    {
        $user= Student::with(['user:id,name,email'])->where('user_id',$userId)->first(['id', 'user_id', 'exam_score', 'assessment_score', 'attendance_average', 'final_grade']);
        $sessionMarks = UserSession::where('user_id', $userId)->get();
        $examMarks = ExamUser::where('user_id', $userId)->get();
        return [
            'user_id' => $user,
            'session_evaluations' => $sessionMarks,
            'exam_scores' => $examMarks,
        ];
    }
}
