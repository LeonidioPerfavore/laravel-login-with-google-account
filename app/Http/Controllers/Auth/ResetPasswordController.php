<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showPasswordResetForm(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function passwordReset(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request){
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if($status !== Password::PASSWORD_RESET){
            return back()->withInput($request->only('email'))->withErrors(['email' => trans($status)]);
        }

        return redirect()->route('show.login.form')->with('status', trans($status));
    }
}