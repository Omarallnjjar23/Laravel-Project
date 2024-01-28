<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => 'required|date',
            'duration' => 'required|numeric|min:1',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }
    
    public function messages()
    {
        return [
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ];
    }
}
