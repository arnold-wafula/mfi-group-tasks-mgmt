<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('guest')->except([
            ''
        ]);
    }
    public function dashboard() {
        if(Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')->withErrors(['employee_id' => 'Log in to access the dashboard'])->onlyInput('employee_id');
    }
}
