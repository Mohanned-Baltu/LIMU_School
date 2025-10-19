<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class schoolReq extends FormRequest
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
            'name' => 'required|string|unique:schools,name',
            'location' => 'required|string',
            'level' => 'required|in:primary,secondary,both',
            'type' => 'required|in:male,female,mixed',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $schoolId = $this->route('school');
            $rules['name'] = 'sometimes|string|unique:schools,name,' . $schoolId;
            $rules['location'] = 'sometimes|string';
            $rules['level'] = 'sometimes|in:primary,secondary,both';
            $rules['type'] = 'sometimes|in:male,female,mixed';
        }

        return $rules;
    }
}
