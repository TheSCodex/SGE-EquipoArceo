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
            'name_user' => 'bail|required|alpha',
            'lastname_user' => 'bail|required|alpha',
            'email_user' => 'bail|required',
            'role_user' => 'bail|required',
            'id_user' => 'bail|required',
            'field_user' => 'bail|required|alpha'
        ];
    }
}
