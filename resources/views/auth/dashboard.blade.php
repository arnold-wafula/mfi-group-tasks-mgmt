<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>

    <!--Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Helvetica;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: #f8f9fa;
            padding-top: 20px;
            color: #000;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }

        #navbar {
            background-color: #343a40;
        }

        .navbar-dark .navbar-brand {
            color: FFFFFF;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .bg-light {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="mfi.jpg" width="50px" height="50px" alt="logo">
            MFI TASKS MANAGEMENT
        </a>
        
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <span class="nav-link user-dropdown" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="color: black;">{{ Auth::user()->employee_id }}</span>
                            <img src="user.jpg" width="30px" height="30px" alt="user-icon">
                        </span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick="logout()">Log out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar">
                <ul class="list-unstyled components">
                    <li>
                        <a href="{{ route('dashboard') }}">Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}">My Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}">Issues</a>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Task & Follow Up
                        </a>
                        
                        <ul class="dropdown-menu" aria-labelledby="tasksDropdown">
                            <li>
                                <a class="dropdown-item dropdown-toggle" href="#" id="nestedDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Task & User Boards
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="nestedDropdown">
                                    <li><a class="dropdown-item" href="#">Tasks</a></li>
                                    <li><a class="dropdown-item" href="#">User Boards</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="content">
        <div class="bg-light">
            @if(Auth::user()->designation !== 'junior')
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>
            @endif 
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Task Key</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>% done</th>
                        <th>Created By</th>
                        <th>Assigned to</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->completed }}</td>
                        <td>% done</td>
                        <td>{{ $task->createdBy->name }}</td>
                        <td>
                            @forelse ($task->assignedTo as $user)
                            {{ $user->name }} - {{ $user->designation }}
                            @empty
                            No Assigned users
                            @endforelse
                        </td>
                        <td>
                            @if(Auth::user()->designation !== 'junior')
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
            
    <script>
    function logout() {
        window.location.href = '{{ route("logout") }}';
    }
    </script>
    
</body>
</html>