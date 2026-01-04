<?php

namespace App\Http\Requests\Api\V1\Penumpang;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Api\V1\Penumpang\ValidateLoginPenumpang;

class ValidatePenumpangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string', new ValidateLoginPenumpang],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Wajib Mengisi Email atau Nomor Telepon',            
            'password.required' => 'Wajib Mengisi Password',            
        ];
    }    
}
