<?php

namespace App\Http\Requests\Daniel;

use Illuminate\Foundation\Http\FormRequest;

class AnteproyectoRequest extends FormRequest
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
            'name_student' => 'bail|required|regex:/^[\pL\s&]+$/u',
            'matricula' => 'bail|required|digits:8',
            'Group' => 'bail|required|regex:/^[a-zA-Z0-9\s-]+$/',
            'Numero' => 'bail|required|digits:10',
            'division_academica' => 'bail|required|regex:/^[a-zA-Z0-9\s-]+$/',
            'proyecto_educativo' => 'bail|required|regex:/^[a-zA-Z0-9\s-]+$/',
            'email_student' => 'bail|required|email',
            'Fecha_Inicio' => 'bail|required|date',
            'Fecha_Final' => 'bail|required|date',
            'name_enterprise' => 'bail|required|regex:/^[a-zA-Z0-9\s&]+$/',
            'direction_enterprise' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
            'name_advisor' => 'bail|required|regex:/^[\pL\s&]+$/u',
            'advisor_position' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
            'email_advisor' => 'bail|required|email',
            'Phone_advisor' => 'bail|required|digits:10',
            'position_student' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
            'name_proyect' => 'bail|required|regex:/^[a-zA-Z\s]+$/',
            'objetivo_general' => 'bail|required|string',
            'planteamiento' => 'bail|required|string',
            'Justificacion' => 'bail|required|string',
            'activities' => 'bail|required|string',
        ];
    }
}
