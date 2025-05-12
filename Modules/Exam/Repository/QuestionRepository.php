<?php
namespace Modules\Exam\Repository;

use Modules\Exam\App\Models\Question;
use Modules\Exam\Repository\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function all()
    {
        return Question::with('answers' , 'subject')->get();
    }

    public function find($id)
    {
        return Question::with('answers')->findOrFail($id);
    }

    public function create(array $data)
    {
        $question = Question::create([
            'question' => $data['question'],
            'subject_id' => $data['subject_id'],
        ]);

        foreach ($data['answers'] as $answer) {
            $question->answers()->create($answer);
        }

        return $question->load('answers');
    }

    public function update($id, array $data)
    {
        $question = Question::findOrFail($id);
        $question->update([
            'question' => $data['question'],
            'subject_id' => $data['subject_id'],
        ]);

        $question->answers()->delete(); // Remove old answers

        foreach ($data['answers'] as $answer) {
            $question->answers()->create($answer);
        }

        return $question->load('answers');
    }

    public function delete($id)
    {
        return Question::destroy($id);
    }
}
