<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\SendLinkRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Response;
use App\Models\UserLogin;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResettingController extends Controller
{
    /**
     * Show a view for forgot password
     */
    public function showFormForgot()
    {
        return view('auth.forgot-password', ['title' => 'forgot-password']);
    }

    /**
     * The password resetting handler
     * 
     * @param  \App\Http\Requests\Auth\SendLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function sendLink(SendLinkRequest $request) 
    {
        $status = Password::sendResetLink(
            $request->only('login')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show a view for reset password
     * 
     * @param string $token
     */
    public function showFormReset(string $token)
    {
        return view('auth.reset-password', [
            'token' => $token, 
            'title' => 'reset-password'
        ]);
    }

     /**
     * Updates the password
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(UpdatePasswordRequest  $request)
    {
        $status = Password::reset(
            $request->only('login', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => Hash::make($password)])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
        
    }
}
