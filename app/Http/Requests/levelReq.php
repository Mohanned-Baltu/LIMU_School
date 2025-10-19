<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class levelReq extends FormRequest
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
            'level' => 'required|string|unique:levels,level',
        ];

        if ($this->isMethod('patch') || $this->isMethod('put')) {
            $levelId = $this->route('level');
            $rules['level'] = 'sometimes|string|unique:levels,level,' . $levelId;
        }

        return $rules;
    }
}
