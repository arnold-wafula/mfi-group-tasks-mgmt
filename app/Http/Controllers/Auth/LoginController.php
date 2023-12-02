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
            // Regenerate session after log in confirmed
            session()->regenerate();

            // Successfully logged in
            session()->flash('success', 'Successfully logged in');

            return redirect()->route('dashboard');
        }

        // Error message for employee id
        session()->flash('error', 'Invalid employee id');

        return back()->withInput(['employee_id']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withSuccess('Logged out successfully');
    }
}