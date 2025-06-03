<?php

namespace Modules\Medication\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'generic_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'usage' => 'required|string',
            'side_effects' => 'required|string',
            'dosage' => 'required|string',
            'system_id'=>'required',
            'effect_id'=>'required'
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
