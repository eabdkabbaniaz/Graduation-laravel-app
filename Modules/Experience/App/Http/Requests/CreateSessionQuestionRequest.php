<?php

namespace Modules\Experience\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSessionQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
 public function rules()
{
    return [
        'questions' => 'required|array|min:1',
        'questions.*.question' => 'required|string',
        'questions.*.question_mode' => 'required|string|in:fixed,dynamic',
        'questions.*.question_mark' => 'required',
        'session_id' => 'required|integer|exists:sessions,id',
        'questions.*.answers' => 'nullable|array',
        'questions.*.answers.*.Answer' => 'required_with:questions.*.answers|string',
        'questions.*.answers.*.is_correct' => 'required_with:questions.*.answers|boolean',
    ];
}


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
