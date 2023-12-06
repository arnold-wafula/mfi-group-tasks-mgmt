@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="col-md-6 mx-auto bg-white p-4 rounded">
            <h1 class="text-center mb-4">Create Task</h1>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" name="task_name" class="form-control" placeholder="Task 1"/>
                    @if($errors->has('task_name'))
                    <span class="text-danger">{{ $errors->first('task_name') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Create a comprehensive weekly report and submit by 10:00 AM Friday"/>
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
                    <input type="datetime-local" name="due_date" class="form-control"/> <!--Include full date and time-->
                    @if($errors->has('due_date'))
                    <span class="text-danger">{{ $errors->first('due_date') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="assigned_to">Assigned to</label>
                    <select name="assigned_to[]" class="form-control" multiple>
                        @foreach($users as $user)
                        @if ($user->employee_id !== Auth::user()->employee_id) <!--only display other users in the list-->
                        <option value="{{ $user->id }}">{{ $user->name }}</option> 
                        @endif
                        @endforeach
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
                
                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
    </div>
@endsection