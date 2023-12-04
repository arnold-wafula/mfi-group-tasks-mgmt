<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new task</title>

    <!--Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <form method="POST" action="{{ route('task.create') }}" class="col-md-6 mx-auto bg-white p-4 rounded">
            @csrf
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
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form>
    </div>
    <!-- Bootstrap JS and Popper.js CDN (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>