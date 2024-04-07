<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class LoginController extends Controller
{

    public function login_form(){
        return view('login');
    }
    public function username()
    {
        $login = request()->input('email');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        Log::info('Login: ' . $login . ', Field: ' . $field);  // Add this line
        request()->merge([$field => $login]);
        return $field;
    }


    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^(?:\\+?8801|01)[1-9]\\d{8}$/', $value)) {
                    $fail('The '.$attribute.' must be a valid email address or Bangladeshi phone number.');
                }
            }],
            'password' => 'required|string',
        ]);
    }


    public function loginUser(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only($this->username(), 'password'), $request->filled('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return back()->withErrors([
            $this->username() => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
       Auth::logout();
        return redirect('/login-form');
    }

    protected function redirectPath()
    {
        return route('post-list');
    }


}
