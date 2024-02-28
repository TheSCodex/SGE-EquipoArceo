<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanieRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|max:255',
            'address' => 'bail|required|string|max:255',
            'phone' => 'bail|required|string|max:20',
            'registration_date' => 'bail|required|date',
            'rfc' => 'bail|required|string|max:20',
            'business_sector_id' => 'bail|required|integer',
        ];
    }
}
