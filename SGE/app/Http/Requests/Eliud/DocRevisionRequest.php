<?php

namespace App\Http\Requests\Eliud;

use Illuminate\Foundation\Http\FormRequest;

class DocRevisionRequest extends FormRequest
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

            'revision_number' => 'bail|required',
            'revision_id' => 'bail|required'
        ];
    }
}
