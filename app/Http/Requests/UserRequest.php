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
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|min:5|starts_with:@|unique:users,username',
            'email' => 'nullable|email:dns|unique:users,email',
            'password' => 'nullable|min:8|max:255',
        ];

        // Jika ada objek user (update), tambahkan aturan unik dengan mengabaikan ID yang sedang diupdate
        if ($this->user) {
            $rules['username'] .= ',' . $this->user->id;
            $rules['email'] .= ',' . $this->user->id;
            $rules['password'] .= ',' . $this->user->id;
        }

        return $rules;
    }
}
