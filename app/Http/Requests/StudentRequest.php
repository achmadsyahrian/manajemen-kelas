<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'nim' => 'required|size:10|regex:/^[0-9]{10}$/|unique:students',
            'gender' => 'nullable',
            'phone' => 'nullable|regex:/^[0-9]{11,}$/|unique:students',
            'photo' => 'image|file|max:5000', //5mb max
        ];
    }
}
