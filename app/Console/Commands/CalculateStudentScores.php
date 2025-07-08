<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Exam\App\Models\Exam;
use Modules\Exam\App\Models\ExamUser;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\UserSession;
use Modules\Mark\App\Models\Setting;
use Modules\Student\App\Models\Student;


class CalculateStudentScores extends Command
{
    protected $signature = 'students:calculate-scores';
    protected $description = 'Calculates student scores and updates final grades.';

    public function handle()
    {
        // echo("hhhhhhhh");
        $examSetting = Setting::where('name', 'exam')->first();
        $assessmentSetting = Setting::where('name', 'assessment')->first();
        $attendanceSetting = Setting::where('name', 'attendance')->first();

$examCount = Exam::where('Final_grade', '!=', 0)->count();
$sessionCount = Session::where('mark', '!=', 0)->count();

        $students = Student::all();

        foreach ($students as $student) {
            $userId = $student->user_id;

       
            $examGrades = ExamUser::where('user_id', $userId)->pluck('grade');
            $examRawScore = $examSetting->calculation_method === 'sum'
                ? $examGrades->sum()
                : ($examGrades->count() > 0 ? $examGrades->sum() / $examGrades->count() : 0);
            $weightedExamScore = $examRawScore * ($examSetting->final_mark / 100);

     
            $sessionMarks = UserSession::where('user_id', $userId)->pluck('mark');
            $assessmentRawScore = $assessmentSetting->calculation_method === 'sum'
                ? $sessionMarks->sum()
                : ($sessionCount > 0 ? $sessionMarks->sum() / $sessionCount : 0);
            $weightedAssessmentScore = $assessmentRawScore * ($assessmentSetting->final_mark / 100);

            
            $sessionsAttended = UserSession::where('user_id', $userId)->count();
            $attendancePercent = $sessionCount > 0 ? ($sessionsAttended / $sessionCount) * 100 : 0;
            $weightedAttendance = $attendancePercent * ($attendanceSetting->final_mark / 100);

          
            $finalGrade = $weightedExamScore + $weightedAssessmentScore + $weightedAttendance;

            $student->update([
                'exam_score' => $examRawScore,
                'assessment_score' => $assessmentRawScore,
                'attendance_average' => $attendancePercent,
                'final_grade' => $finalGrade,
            ]);
        }

        $this->info('✔️ تم حساب وتحديث علامات جميع الطلاب.');
    }
}
