<?php

namespace App\Http\Requests\Pipa;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rol_name' => 'required|string|max:255',
            'permissions' => 'required',
            // 'permissions.permiso1' => 'nullable|boolean',
            // 'permissions.permiso2' => 'nullable|boolean',
            // 'permissions.permiso3' => 'nullable|boolean',
        ];
    }
}
