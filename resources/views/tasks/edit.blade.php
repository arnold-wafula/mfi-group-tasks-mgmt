@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="col-md-6 mx-auto bg-white p-4 rounded">
            <h1 class="text-center mb-4">Edit Task</h1>

            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="task_name">Task Name</label>
                    <input type="text" name="task_name" class="form-control" value="{{ old('task_name', $task->task_name) }}" placeholder="Task 1">
                    @if($errors->has('task_name'))
                    <span class="text-danger">{{ $errors->first('task_name') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $task->description) }}" placeholder="Create a comprehensive weekly report and submit by said time"/>
                    @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="due_date">Due date</label>
                    <input type="datetime-local" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}"/>
                    @if($errors->has('due_date'))
                    <span class="text-danger">{{ $errors->first('due_date') }}</span>
                    @endif
                </div>
            
                <div class="form-group">
                    <label for="assigned_to">Assigned to</label>
                    <select name="assigned_to[]" class="form-control" multiple>
                        @foreach($users as $user)
                        @if ($user->employee_id !== Auth::user()->employee_id) <!--only display other users in the list-->
                        <option value="{{ $user->id }}" {{ in_array($user->id, old('assigned_to', $task->assignedTo->pluck('id')->toArray()) ?: []) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="completed">Status</label>
                    <select name="completed" class="form-control">
                        @foreach(['started', 'in_progress', 'completed'] as $status)
                            <option value="{{ $status }}" {{ old('completed', $task->completed) == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Task</button>
            
            </form>
        </div>
    </div>
@endsection