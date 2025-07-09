<?php

namespace Modules\Experience\Repository;

use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Semester;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\Models\SessionAnswer;
use Modules\Experience\App\Models\SessionQuestion;

class SessionQuestionsRepository
{

    // public function create(array $data)
    // {
    //     $sessionQuestion = SessionQuestion::create([
    //         'question' => $data['question'],
    //         'question_mode' => $data['question_mode'],
    //         'session_id' => $data['session_id'],
    //     ]);
    //     if ($data['question_mode'] === 'dynamic' && !empty($data['answers'])) {
    //         $answers = array_map(function ($answer) use ($sessionQuestion) {
    //             $answer['session_question_id'] = $sessionQuestion->id;
    //             return $answer;
    //         }, $data['answers']);

    //         $sessionQuestion->sessionAnswers()->createMany($answers);
    //     }

    //     return $sessionQuestion->fresh('sessionAnswers');
    // }

    public function create(array $questionsData)
{
    $results = [];

    foreach ($questionsData['questions'] as $data) {
        $sessionQuestion = SessionQuestion::create([
            'question' => $data['question'],
            'question_mode' => $data['question_mode'],
            'questions_mark' => $data['question_mark'],
            'session_id' => $questionsData['session_id'],
        ]);

       
        if ($data['question_mode'] === 'dynamic' && !empty($data['answers'])) {
            $answers = array_map(function ($answer) use ($sessionQuestion) {
                $answer['session_question_id'] = $sessionQuestion->id;
                return $answer;
            }, $data['answers']);

            $sessionQuestion->sessionAnswers()->createMany($answers);
        }

        $results[] = $sessionQuestion->fresh('sessionAnswers');
    }

    return $results;
}



    public function update(array $data)
    {
        $sessionQuestion = SessionQuestion::findOrFail($data['questio_id']);

        $sessionData = $data['session']; 

        $sessionQuestion->update([
            'question' => $sessionData['question'],
            'question_mode' => $sessionData['question_mode'],
        ]);


        if ($sessionData['question_mode'] === 'dynamic') {
            $sessionQuestion->sessionAnswers()->delete();

            $answers = array_map(function ($answer) use ($sessionQuestion) {
                $answer['session_question_id'] = $sessionQuestion->id;
                return $answer;
            }, $sessionData['answers']);

            $sessionQuestion->sessionAnswers()->createMany($answers);
        }

     
        return $sessionQuestion->fresh('sessionAnswers');
    }

    public function delete($id)
    {
        $session = $this->get($id);
        $session->delete();
    }

    public function find($id)
    {
        return SessionQuestion::with('sessionAnswers')->findOrFail($id);
    }

    public function get($id)
    {
        return SessionQuestion::findOrFail($id);
    }


    public function getall()
    {
        return SessionQuestion::with('sessionAnswers')->get();
    }
    public function showSessionQuestion($questionId)
    {
        return SessionQuestion::with('sessionAnswers')->where('session_id',$questionId)->get();
    }
}
