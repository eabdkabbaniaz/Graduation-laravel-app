<?php

namespace Modules\Mark\App\Http\Controllers;

use App\Exports\GradesExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Mark\Services\GradeService;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Mark\App\resources\StudentGradeResource;
use Modules\Student\App\Models\Student;

use Maatwebsite\Excel\Facades\Excel;
class GradeController extends Controller
{
    protected GradeService $service;

    public function __construct(GradeService $service)
    {
        $this->service = $service;
    }

 
    public function myGrades()
    {
        $user = auth()->user();
        // return Student::where('user_id',$user->id)->first();
        return response()->json($this->service->getStudentStats($user->id));
    }

    // ✅ تفاصيل طالب باستخدام معرف المستخدم
    public function studentGrades($userId)
    {
        return response()->json($this->service->getStudentStats($userId));
    }


    public function allStudentGrades()
    {
        $grades = $this->service->getAllStudentsGrades();
        return StudentGradeResource::collection($grades);
    }
    
 
    public function getCalculationMethods()
    {
        return response()->json($this->service->getCalculationSettings());
    }

    public function updateCalculationMethods(Request $request ,$id)
    {
        $data =$request->all();
        $data['id']=$id;
    
        return response()->json($this->service->updateCalculationSettings($data));
    }

    public function myDetails()
{
    $userId = auth()->id();
    $data = $this->service->getStudentDetails($userId);
    return response()->json($data);
}

public function userDetails($userId)
{
    $data = $this->service->getStudentDetails($userId);
    return response()->json($data);
}


public function export(     Request $request)
{
    $columns = $request->input('columns');

    return Excel::download(new GradesExport($columns), 'grades.xlsx');
}

}

