<?php

namespace Modules\Experience\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string',
            // 'code' => 'sometimes|string|unique:sessions,code,' . $this->session->id,
            'experience_id' => 'sometimes|exists:experiences,id',
            'teacher_id' => 'sometimes|exists:users,id',
            'drug_ids' => 'sometimes|array',
            'drug_ids.*' => 'exists:drugs,id',
            'status'=>'boolean',

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
