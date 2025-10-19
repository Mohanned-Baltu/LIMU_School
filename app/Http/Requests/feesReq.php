<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class feesReq extends FormRequest
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
            'schoolId' => 'required|integer',
            'level' => 'required|integer',
            'price' => 'required|numeric',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $rules = array_map(function ($rule) {
                return 'sometimes|' . $rule;
            }, $rules);
        }

        return $rules;
    }
}
