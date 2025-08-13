<?php

namespace Modules\Exam\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'question' => 'required|string',
            'subject_id' => 'required|exists:subjects,id',
            'answers' => 'required|array|max:5',
            'answers.*.Answer' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
  
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
