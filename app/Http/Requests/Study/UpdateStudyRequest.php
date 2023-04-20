<?php

namespace App\Http\Requests\Study;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudyRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'logo' => 'image',
            'description' => 'required',
            'start_year' => 'required|numeric|digits:4',
            'end_year' => 'required|numeric|digits:4'
        ];
    }
}
