<?php

namespace Modules\Experience\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            // 'code' => 'required|string|unique:sessions,code',
            'experience_id' => 'required|exists:experineces_semesters,id',
            // 'semester_id' => 'required|exists:semesters,id',
            // 'teacher_id' => 'required|exists:users,id',
            'drug_ids' => 'required|array',
            'status'=>'boolean',
            'mark' => 'numeric',
            'drug_ids.*' => 'exists:drugs,id',
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
