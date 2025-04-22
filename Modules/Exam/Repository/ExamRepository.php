<?php
namespace Modules\Exam\Repository;

use Modules\Exam\App\Models\Exam;
use Modules\Exam\App\Models\ExamSubject;
use Modules\Exam\App\Models\ExamUser;
use Modules\Exam\App\Models\Subject;

class ExamRepository
{
    public function all()
    {
        return Exam::with('subject', 'teacher')->get();
    }

    public function find($id)
    {
        return Exam::with('subject', 'teacher')->findOrFail($id);
    }

    public function create(array $data)
    {
        $exam= Exam::create($data['data']);
        foreach(   $data['subject_id'] as $subject){
            ExamSubject::create([
                "exam_id"=>$exam->id,
                "subject_id"=>$subject
            ]);

        }
        return $exam;
    }

    public function update($id, array $data)
    {
        $exam = $this->find($id);
        $exam->update($data);
        return $exam;
    }

    public function delete($id)
    {
        return Exam::destroy($id);
    }

    public function expired()
    {
        return Exam::where(
    [
                ['End_date', '<', now()],
                ['status',true],
            ])->get();
    }
    public function findUserExam($data)
    {
        $users=ExamUser::where([
            [ 'user_id' , $data['user_id']],
            [ 'exam_id', $data['exam_id']],
        ])->first();
        return $users;
    }
}