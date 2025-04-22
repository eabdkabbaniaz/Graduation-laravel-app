<?php

namespace Modules\Student\App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'email' => 'required|email' ,
            'password' => 'required|min:8',
        ];
    }

    public function failedValidation(Validator $validator)
{
    
    // throw new ValidationException($validator, ResponseService::validation([],$validator->errors()));
}

}
