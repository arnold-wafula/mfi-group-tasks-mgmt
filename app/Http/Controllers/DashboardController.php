<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {
        if(Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')->withErrors(['employee_id' => 'Log in to access the dashboard'])->onlyInput('employee_id');
    }
}
