<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $user_in_db = User::where('email', $user->getEmail())->first();
            if(!$user_in_db){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

            }else{
                User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                    'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            Auth::login($saveUser);

            return redirect()->route('dashboard');

        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}