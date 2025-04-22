<?php
namespace Modules\Exam\Services;

use Modules\Exam\App\Models\ExamQuestion;
use Modules\Exam\Repository\ExamRepository;
class ExamService
{
    protected $examRepo;

    public function __construct(ExamRepository $examRepo)
    {
        $this->examRepo = $examRepo;
    }

    public function listAll()
    {
        return $this->examRepo->all();
    }

    public function getById($id)
    {
        return $this->examRepo->find($id);
    }

    public function store(array $data)
    {
        // $data['teacher_id'] = $teacherId;
    
        $exam['data']['teacher_id']=$data['teacher_id'];
        $exam['data']['name']=$data['name'];
        $exam['data']['number_of_questions']=$data['number_of_questions'];
        $exam['data']['Final_grade']=$data['Final_grade'];
        $exam['data']['Start_date']=$data['Start_date'];
        $exam['data']['End_date']=$data['End_date'];
        $exam['subject_id']=$data['subject_id'];
        return $this->examRepo->create($exam);
    }

    public function update($id, array $data)
    {
        return $this->examRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->examRepo->delete($id);
    }
    public function Addmark($request)
    {
        $user = auth()->user(); 
        $data['user_id']=$user->id;
        $data['exam_id']=$request->exam_id;
        $users= $this->examRepo->findUserExam($data);
        foreach($request->ans as $an){
            $question =ExamQuestion::find($an['id']);
            $question->answer_id =$an['answer_id'];
            $question->save();
        }
            $users->grade=$request->grade;
            $users->save();
        
        return $users;
    }
}