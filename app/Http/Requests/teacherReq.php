<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherReq extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'phoneNumber' => 'required|string|unique:teachers,phoneNumber',
            'subject' => 'required|string',
            'level' => 'required|string',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $teacherId = $this->route('teacher');
            $rules['name'] = 'sometimes|string';
            $rules['phoneNumber'] = 'sometimes|string|unique:teachers,phoneNumber,' . $teacherId;
            $rules['subject'] = 'sometimes|string';
            $rules['level'] = 'sometimes|string';
        }

        return $rules;
    }
}
