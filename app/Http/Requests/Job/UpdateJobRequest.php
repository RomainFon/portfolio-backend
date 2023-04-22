<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'company' => 'required',
            'city' => 'required',
            'type' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
    }
}
