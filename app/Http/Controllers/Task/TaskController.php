<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{
    // Create a task
    public function create(Request $request) {
        // Validate the form data
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'assigned_to' => 'required|string',
            'completed' => 'required|string'
        ]);

        // Create a new task
        Task::create($request->all());

        return redirect()->route('task.show')->with('success', 'Task created successfully');
    }

    // Display created tasks
    public function show() {
        // Retrieve all tasks from the database
        $tasks = Task::all();

        return view('task.show', ['tasks' => $tasks]);
    }

    public function delete() {
        return view('task.delete');
    }
}
