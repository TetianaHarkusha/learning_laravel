<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    /**
     * Show a view instructing the user after registration
     */
    public function showNotice(){
        return view('auth.verify', ['title' => 'verify']);
    }

    /**
     * The Email Verification Handler
     */
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect()->route('main');
    }

    /**
     * Resending The Verification Email
     */
    public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->withSuccess(__('A fresh verification link has been sent to your email address!'));
    }
}
