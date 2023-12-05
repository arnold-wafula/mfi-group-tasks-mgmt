@extends('layouts.app')

@section('content')
    <h1>Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

    @if ($tasks->count() > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.edit', $task) }}">{{ $task->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tasks found.</p>
    @endif
@endsection