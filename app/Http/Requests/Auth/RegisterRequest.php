<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
//        return User::VALIDATION_RULES+[
//            'name' => ['required', 'string', 'max:255'],
//            'password' => ['confirmed'],
//            'email' => ['unique:users'],
//            ];

        $rules = User::VALIDATION_RULES+[
                'name' => ['required', 'string', 'max:255'],
                'password' => ['confirmed'],
//                'email' => ['unique:users'],
            ];
        $rules['email'][1] = 'unique:users,email';

        return $rules;
    }

//    public function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'message'   => 'Validation errors',
//            'data'      => $validator->errors()
//        ]));
//    }

//    if($this->getMethod() == 'POST'){
//        store
//$rules += ['password' => 'reqired']
//}else{
//        update
//    $rules['email'][1] = 'unique:users,email'.request()->route('user')->id();
//}
}