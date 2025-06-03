<?php

namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\App\Http\Requests\CreateTeacherRequest;
use Modules\Student\App\Http\Requests\SignInRequest;
use Modules\Student\Services\TeacherService;
use Modules\Traits\ApiResponseTrait;
use Modules\Exam\App\Models\Exam;
use Modules\Exam\App\Models\ExamUser;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\UserSession;
use Modules\Mark\App\Models\Setting;
use Modules\Student\App\Models\Student;

class TeacherController extends Controller
{
    public TeacherService $service;
    public function __construct( TeacherService $service) {
        $this->service = $service;
    }
    

    public function index(){
        return $this->service->index(); 
    }
    public function create(CreateTeacherRequest $request)
    {
        try {
        
            $result= $this->service->register($request->validated());
        
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
//         $examSetting = Setting::where('name', 'exam')->first();
//         $assessmentSetting = Setting::where('name', 'assessment')->first();
//         $attendanceSetting = Setting::where('name', 'attendance')->first();

//         $examCount = Exam::count();
//         $sessionCount = Session::count();

//         $students = Student::all();

//         foreach ($students as $student) {
//             $userId = $student->user_id;

       
//             $examGrades = ExamUser::where('user_id', $userId)->pluck('grade');
//             $examRawScore = $examSetting->calculation_method === 'sum'
//                 ? $examGrades->sum()
//                 : ($examGrades->count() > 0 ? $examGrades->sum() / $examGrades->count() : 0);
//             $weightedExamScore = $examRawScore * ($examSetting->final_mark / 100);

     
//             $sessionMarks = UserSession::where('user_id', $userId)->pluck('mark');
//             $assessmentRawScore = $assessmentSetting->calculation_method === 'sum'
//                 ? $sessionMarks->sum()
//                 : ($sessionCount > 0 ? $sessionMarks->sum() / $sessionCount : 0);
//             $weightedAssessmentScore = $assessmentRawScore * ($assessmentSetting->final_mark / 100);

            
//             $sessionsAttended = UserSession::where('user_id', $userId)->count();
//             $attendancePercent = $sessionCount > 0 ? ($sessionsAttended / $sessionCount) * 100 : 0;
//             $weightedAttendance = $attendancePercent * ($attendanceSetting->final_mark / 100);

          
//             $finalGrade = $weightedExamScore + $weightedAssessmentScore + $weightedAttendance;

//             $student->update([
//                 'exam_score' => $examRawScore,
//                 'assessment_score' => $assessmentRawScore,
//                 'attendance_average' => $attendancePercent,
//                 'final_grade' => $finalGrade,
//             ]);
//         }
// return  $students;
//         // $this->info('✔️ تم حساب وتحديث علامات جميع الطلاب.');
    
    }

    public function edit(Request $request ,$id)
    {
        try {
            $message['id'] = $id;
            $message['data'] = $request->input();
            $result= $this->service->update($message);
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
 
    }

    public function destroy($id)
    {
       
        try {
            $result=  $this->service->destroy($id);
               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 

    }
    public function toggleActivation($id)
    {
        
        try {
            $result=  $this->service->toggleActivation($id);

               return ApiResponseTrait::successResponse("succ",$result );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 


    }
    
    public function login(  Request $request)
    {
        
        try {
            $teacher = $this->service->login($request->all());
            if (!$teacher) {
                return ApiResponseTrait::errorResponse( 'Invalid credentials', 401);
            }
               return ApiResponseTrait::successResponse("succ",$teacher );
           } catch (\Throwable $e) {
               return ApiResponseTrait::errorResponse($e->getMessage());
           } 
     
    }

}
