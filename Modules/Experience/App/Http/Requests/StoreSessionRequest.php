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
            'experience_id' => 'required|exists:experiences,id',
            'teacher_id' => 'required|exists:users,id',
            'sison_id' => 'required|exists:sisons,id',
            'drug_ids' => 'required|array',
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
