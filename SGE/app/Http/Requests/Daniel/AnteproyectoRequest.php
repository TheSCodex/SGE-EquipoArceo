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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_student' => 'bail|required|alpha',
            'matricula' => 'bail|required|digits:8',
            'Group' => 'bail|required|alpha',
            'Numero' => 'bail|required|digits:10',
            'division_academica' => 'bail|required|alpha',
            'proyecto_educativo' => 'bail|required|alpha',
            'email_student' => 'bail|required|email',
            'Fecha_Inicio' => 'bail|required|date',
            'Fecha_Final' => 'bail|required|date',
            'name_enterprise' => 'bail|required|alpha',
            'direction_enterprise' => 'bail|required|alpha',
            'name_advisor' => 'bail|required|alpha',
            'advisor_position' => 'bail|required|alpha',
            'email_advisor' => 'bail|required|email',
            'Phone_advisor' => 'bail|required|digits:10',
            'position_student' => 'bail|required|alpha',
            'name_proyect' => 'bail|required|alpha',
            'objetivo_general' => 'bail|required|string',
            'planteamiento' => 'bail|required|string',
            'Justificacion' => 'bail|required|string',
            'activities' => 'bail|required|string',
        ];
    }
}
