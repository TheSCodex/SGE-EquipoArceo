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
    $rules = [
        'name' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
        'last_name' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
        'email' => 'bail|required',
        'rol_id' => 'bail|required',
        'identifier' => 'bail|required',
    ];

    // Aplicar reglas adicionales dependiendo del valor de rol_id
    $rolId = $this->input('rol_id');

    if ($rolId === '1') {
        $rules['career_id'] = 'bail|required';
        $rules['group_id'] = 'bail|required';
    } elseif ($rolId === '2') {
        $rules['career_id'] = 'bail|required';
    }

    return $rules;
}
}
