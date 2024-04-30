<?php

namespace App\Http\Requests\Eliud;

use Illuminate\Foundation\Http\FormRequest;

class EgresadosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'startFolio' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'startFoja' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
        ];
    }
}
