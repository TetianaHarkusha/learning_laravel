<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    /**
     * Show login form 
     * 
     * @return Illuminate\Http\Response;
     */
    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'login']);
    }

    /**
     * Show register form 
     * 
     * @return Illuminate\Http\Response;
     */
    public function showRegisterForm()
    {
        return view('auth.register', ['title' => 'register']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeRegister(UserLoginRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        
        $userLogin = $user->login()->create([
            'login' => $request->input('login'),
            'role_id' => DB::table('roles')->where('name', 'user')->value('id'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($userLogin);
        event(new Registered($userLogin));

        return back()->withSuccess(__('The user has been successfully registered.'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function storeLogin(Request $request)
    {
        if(Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password')],
            $request->input('remember')
        )) {
            $request->session()->regenerate();
            return redirect()->intended();
        };

        if(UserLogin::where('login', $request->input('login'))->count()) {
            $errors['password'] = 'The password is wrong';
        } else {
            $errors['login'] = 'The login is wrong';
        };
        
        return back()->withErrors($errors)->onlyInput('login');
    }

    /**
     * Destroy an authenticated session.
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return back();
    }
}
