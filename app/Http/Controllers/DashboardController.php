<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        //$users = User::all(); // Fetch all users, replace with your actual query

        //return view('auth.dashboard', compact('users'));

        $tasks = Task::all();
        return view('auth.dashboard', compact('tasks'));
    }
}