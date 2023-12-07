<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // Show a list of tasks on the dashboard
    public function index() {
        // Fetch tasks along with assigned users and creators
        $tasks = Task::with(['assignedTo', 'createdBy'])->get();
        return view('tasks.index', compact('tasks'));
    }

    // Display the form for creating a new task
    public function create() {
        // Fetch users (excluding the current user) for task assignment
        $users = User::where('id', '!=', auth()->id())->get();
        return view('tasks.create', compact('users'));
    }

    // Store a new task in the database
    public function store(Request $request) {
        // Validate the input data
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date_format:Y-m-d\TH:i', //date_format to include time changes
            'assigned_to' => 'required|array',
            'assigned_to.*' => 'exists:users,id',
            'completed' => 'required|string'
        ]);

        // Create a new task with input data and link it to the creator
        $task = Task::create([
            'task_name' => $request->input('task_name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'completed' => $request->input('completed'),
            'created_by' => auth()->id()
        ]);

        // Attach assigned users to the task
        $task->users()->attach($request->input('assigned_to'));
        
        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }

    // Display the form for editing an existing task
    public function edit(Task $task) {
        // Fetch users for task assignment
        // Should exclude current user
        $users = User::where('id', '!=', auth()->id())->get();

        return view('tasks.edit', compact('task', 'users'));
    }

    // Update an existing task in the database
    public function update(Request $request, Task $task) {
        // Validate the input data
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date_format:Y-m-d\TH:i',
            'assigned_to' => 'required|array',
            'assigned_to.*' => 'exists:users,id',
            'completed' => 'required|string'
        ]);

        // Update the task with the new input data
        //$task->update($request->all());

        $task->update([
            'task_name' => $request->input('task_name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'completed' => $request->input('completed')
        ]);

        // Sync the assigned users for the task
        $task->users()->sync($request->input('assigned_to'));

        return redirect()->route('dashboard')->with('success', 'Task updated successfully');
    }

    // Delete an existing task from the database
    public function destroy(Task $task) {
        // Delete the task
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
}