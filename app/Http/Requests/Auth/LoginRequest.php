<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return User::VALIDATION_RULES;

//        $rules = User::VALIDATION_RULES;
//        $rules['email'][1] = 'unique:users,email'.request()->route('user')->id();
    }
}