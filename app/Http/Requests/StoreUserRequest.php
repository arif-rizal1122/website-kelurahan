<?php

namespace App\Http\Requests;

use App\Enums\User;
use App\Enums\UserEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed', 
            'role' => ['required', Rule::enum(UserEnum::class)],
            'nip' => 'nullable|string|unique:users',
            'jabatan' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048', 
        ];
    }

    
}