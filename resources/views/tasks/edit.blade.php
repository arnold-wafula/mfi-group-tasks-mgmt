@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" class="form-control" placeholder="Send reports by 10:00 A.M"/>
            @if($errors->has('task_name'))
            <span class="text-danger">{{ $errors->first('task_name') }}</span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Create a comprehensive weekly report and submit by said time"/>
            @if($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
            
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control">
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="due_date">Due date</label>
            <input type="date" name="due_date" class="form-control"/>
            @if($errors->has('due_date'))
            <span class="text-danger">{{ $errors->first('due_date') }}</span>
            @endif
        </div>
            
        <div class="form-group">
            <label for="assigned_to">Assigned to</label>
            <select name="assigned_to" class="form-control">
                <option value="junior">Junior</option>
                <option value="mid">Mid-level</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="completed">Status</label>
            <select name="completed" class="form-control">
                <option value="started">Started</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection