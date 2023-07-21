<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    // THE FOLLOWING FUNCTION RETURNS THE USER REGISTRATION VIEW
    public function register()
    {
        return view('auth.register');
    }

    // THE FOLLOWING FUNCTION REGISTERS USER INTO THE DATABASE
    public function registerUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($validated);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('welcome');
        }
    }

    // THE FOLLOWING FUNCTION RETURNS THE USER LOGIN VIEW
    public function login()
    {
        return view('auth.login');
    }

    // THE FOLLOWING FUNCITON AUTHENTICATES A REGISTERED USER
    public function loginUser(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // THE FOLLOWING FUNCTION LOGS OUT AN AUTHENTICATED USER
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
