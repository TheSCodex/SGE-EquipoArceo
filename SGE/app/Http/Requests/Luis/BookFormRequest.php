<?php

namespace App\Http\Requests\Luis;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title' => 'bail|required|string|max:255',
            'author' => 'bail|required|string|max:255',
            'isbn' => 'bail|required|string|max:255',
            'identifier_student' => 'bail|required|string',
        ];
    }
}
