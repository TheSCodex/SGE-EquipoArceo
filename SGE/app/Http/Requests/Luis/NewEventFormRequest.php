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
            'receiver_id' => 'bail|required',
            'title' => 'bail|required|regex:/^[a-zA-Z0-9\s\W]+$/',
            'eventType' => 'bail|required|regex:/^[a-zA-Z0-9\s\W]+$/',
            'description' => 'bail|required|regex:/^[a-zA-Z0-9\s\W]+$/',
            'location' => 'bail|required|regex:/^[a-zA-Z0-9\s\W]+$/',
            'date_start' => 'bail|required|date',
            'date_end' => 'bail|required|date',
            'status' => 'bail|required|regex:/^[a-zA-Z0-9\s\W]+$/',
        ];
    }
}
