<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Only guests should access the login page
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function create() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'employee_id' => 'required|exists:users,employee_id',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('Successfully logged in');
        }

        return back()->withErrors([
            'employee_id' => 'Invalid employee id'
        ])->onlyInput('employee_id');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withSuccess('Logged out successfully');
    }
}