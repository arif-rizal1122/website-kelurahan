<?php

namespace App\Http\Requests;

use App\Enums\UserEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You might want to implement authorization logic here
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => ['required', 'string', 'email', 'max:100', Rule::unique('users')->ignore($this->user)],
            'password' => 'nullable|string|min:8|confirmed', // Make password optional
            'role' => ['required', Rule::enum(UserEnum::class)],
            'nip' => ['nullable', 'string', Rule::unique('users')->ignore($this->user)],
            'jabatan' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
        ];
    }

    
}