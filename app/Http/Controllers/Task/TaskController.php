<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() {
        //$tasks = Task::all();
        $tasks = Task::with(['assignedTo', 'createdBy'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        //$users = User::all(); // Fetch all users for the assignment dropdown
        $users = User::where('id', '!=', auth()->id())->get();
        return view('tasks.create', compact('users'));

        //return view('tasks.create');
    }

    public function store(Request $request) {
        // Validate the input data
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date',
            'assigned_to' => 'required|array',
            'assigned_to.*' => 'exists:users,id',
            'completed' => 'required|string'
        ]);

        // Create the task
        //Task::create($request->all());

        //$task = Task::create($request->except('assigned_to'));

        $task = Task::create([
            'task_name' => $request->input('task_name'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'completed' => $request->input('completed'),
            'created_by' => auth()->id()
        ]);

        // Attach users to the task
        $task->users()->attach($request->input('assigned_to'));

        //return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        
        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task) {
        return view('tasks.edit', compact($task));
    }

    public function update(Request $request, Task $task) {
        // Validate the input data
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date',
            'assigned_to' => 'required|array',
            'assigned_to.*' => 'exists:users,id',
            'completed' => 'required|string'
        ]);

        // Update the task
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task) {
        // Delete the task

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}