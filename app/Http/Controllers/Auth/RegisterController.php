<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Only guests should access the register page
    public function __construct() {
        $this->middleware('guest');
    }

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'employee_id' => 'required|string|max:12|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'designation' => 'required|string',
            'department' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'designation' => $request->designation,
            'department' => $request->department,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->withSuccess('Registered successfully! Proceed to log in');
    }
}