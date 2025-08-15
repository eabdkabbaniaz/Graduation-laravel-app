<?php

namespace Modules\Exam\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Exam\app\Http\Requests\ExamRequest;
use Modules\Exam\App\Models\ExamQuestion;
use Modules\Exam\App\Models\ExamSubject;
use Modules\Exam\App\Models\Question;
use Modules\Exam\Services\ExamService;
use Modules\Exam\app\Models\Exam;
use Modules\Exam\app\Models\ExamUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    protected $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
         }

    public function index()
    {
        return response()->json($this->examService->listAll());
    }

    public function store(ExamRequest $request)
    {
        $data =$request->validated();
        $data['teacher_id'] = auth()->id();

        $exam = $this->examService->store($data);
        return response()->json($exam, 201);
    }

    public function show($id)
    {
        return response()->json($this->examService->getById($id));
    }

    public function update(ExamRequest $request, $id)
    {
   $data =$request->validated();
        $data['teacher_id'] = auth()->id();

        $exam = $this->examService->update($id, $data);
        return response()->json($exam);
    }

    public function updatestatus($id)
    {
//    $data =$request->validated();
        // $data['teacher_id'] = auth()->id();

        $exam = $this->examService->updatestatus($id);
        return response()->json($exam);
    }

    public function destroy($id)
    {

        $this->examService->delete($id);
        return response()->json(['message' => 'Exam deleted']);
    }



public function Addmark( Request $request){
  return  $this->examService->Addmark($request);
}
public function startExam( $examId)
{
    $user = auth()->user(); 

    $exam = Exam::findOrFail($examId);
    
    if ($exam->status===false) {
        return response()->json(['message' => 'exams unavialable'], 403);
    }

    DB::beginTransaction();
    try {
        $users=ExamUser::where([
            [ 'user_id' , $user->id],
            [ 'exam_id', $exam->id]
        ])->first();
        if($users){
            return response()->json(['message' => 'you can do exam one time'], 400);

        }
  
        $examUser = ExamUser::create([
            'user_id' => $user->id,
            'exam_id' => $exam->id,
            'grade'=>0,
        ]);
$subject =ExamSubject::where('exam_id' ,$exam->id)->select('subject_id');
        // $question_num =$exam->number_of_questions;
        if ($examUser->questions()->count() === 0) {
            // foreach($exam->subject_id as $subject)
            $questions = Question::whereIn('subject_id', $subject)
                ->inRandomOrder()
                ->limit($exam->number_of_questions)
                ->get();

            foreach ($questions as $question) {
                $examUser->questions()->create([
                    'question_id' => $question->id
                ]);
            }
        }

        DB::commit();

  
        $questionsWithAnswers = $examUser->questions()->with('question.answers')->get();

        return response()->json([
            'exam' => $exam->only(['id', 'name','time', 'Final_grade','number_of_questions']),
            'questions' => $questionsWithAnswers
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
    }
}

}
