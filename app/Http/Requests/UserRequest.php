<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users,username,' . $this->user->id,
            'email' => 'nullable|email:dns|unique:users,email,' . $this->user->id,
            'password' => 'nullable|min:8|max:255|unique:users,password,' . $this->user->id,
        ];
    }
}
