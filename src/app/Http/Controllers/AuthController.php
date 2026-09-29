<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    function register_store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $validate['password']= Hash::make($validate['password']);
        $user = User::create($validate);

        Auth::login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
