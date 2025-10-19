<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class managerReq extends FormRequest
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
            'email' => 'required|email|unique:managers,email',
            'phoneNumber' => 'required|string|unique:managers,phoneNumber',
            'password' => 'required|string|min:8',
            'schoolId' => 'required|integer',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $managerId = $this->route('manager');
            $rules['email'] = 'sometimes|email|unique:managers,email,' . $managerId;
            $rules['phoneNumber'] = 'sometimes|string|unique:managers,phoneNumber,' . $managerId;
            $rules['password'] = 'sometimes|string|min:8';
            $rules['name'] = 'sometimes|string';
            $rules['schoolId'] = 'sometimes|integer';
        }

        return $rules;
    }
}
