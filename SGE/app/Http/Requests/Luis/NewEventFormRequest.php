<?php

namespace App\Http\Requests\Luis;

use Illuminate\Foundation\Http\FormRequest;

class NewEventFormRequest extends FormRequest
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
            'title' => 'bail|required|alpha',
            'eventType' => 'bail|required|alpha',
            'description' => 'bail|required|alpha|string',
            'location' => 'bail|required|alpha|string',
            'date' => 'bail|required|date',
        ];
    }
}
