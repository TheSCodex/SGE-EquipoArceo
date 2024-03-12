<?php

namespace App\Http\Requests\Pipa;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'bail|required|alpha',
            'last_name' => 'bail|required|alpha',
            'email' => 'bail|required',
            'rol_id' => 'bail|required',
            'identifier' => 'bail|required',
            'career_academy_id' => 'bail|required'
        ];
    }
}
