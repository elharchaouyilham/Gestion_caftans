<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        Auth::login($user);

        return $this->redirectByRole($user);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Email ou mot de passe incorrect');
        }

        $user = Auth::user();

        return $this->redirectByRole($user);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    private function redirectByRole($user)
    {
        if ($user->role_id == 1) {
            return redirect('/dashboardClient');
        }

        return redirect('admin.dashboard.index');
    }
}
