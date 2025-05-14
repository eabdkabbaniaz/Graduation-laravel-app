<?php

namespace Modules\Exam\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'number_of_questions' => 'required|integer|min:1',
            'Final_grade' => 'required|numeric|min:0',
            'Start_date' => 'required|date|after_or_equal:today',
            'End_date' => 'required|date|after:Start_date',
            'subject_id' => 'required',
            'time'=>'required|numeric|min:0'
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
