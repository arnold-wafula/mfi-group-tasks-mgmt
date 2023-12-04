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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="mfi.jpg" width="50px" height="50px" alt="logo">
            MFI TASKS MANAGEMENT
        </a>
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-link"></span>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-danger logout-btn" onclick="logout()">Logout</button>
                </li>
            </ul>

        </div>
    </nav>
    <div id="sidebar" class="bg-light">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-black sidebar-link" data-target="projects" href="#">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black sidebar-link" data-target="my-projects" href="#">My Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black sidebar-link" data-target="issues" href="#">Issues</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black sidebar-link" data-target="user-boards" href="#">User Boards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black sidebar-link" data-target="tasks-follow-up" href="#" onclick="loadContent('tasks-follow-up')">Task & Follow Up</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div id="content">
        <!-- Your dashboard content goes here -->
        <div id="dynamic-content">
            <!-- Content loaded dynamically will be displayed here -->
            <h1>Welcome to the Employee Dashboard</h1>
            <button type="button" class="btn btn-primary" onclick="{{ route('task.create') }}">Create New Task</button>
        </div>
        <!-- Add your dashboard components, charts, etc. here -->
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function logout() {
            window.location.href = '{{ route("logout") }}';
        }

        document.querySelectorAll('.sidebar-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                var target = this.getAttribute('data-target');
                loadContent(target);
            });
        });

        function loadContent(target) {
        switch(target) {
            case 'projects':
                document.getElementById('content').innerHTML = '<h1>Projects Content</h1>';
                break;

            case 'my-projects':
                document.getElementById('content').innerHTML = '<h1>My Projects Content</h1>';
                break;
            
            case 'issues':
                document.getElementById('content').innerHTML = '<h1>Issues Content</h1>';
                break;
            
            case 'user-boards':
                document.getElementById('content').innerHTML = '<h1>User Boards Content</h1>';
                break;

            case 'tasks-follow-up':
                // Fetch content from "task" route using AJAX
                var url = '{{ route("task.show") }}';

                $.ajax({
                    url: url,
                    method: 'GET',
                    dataType: 'html', // Specify the expected data type
                    success: function(response) {
                        // Update content with fetched data
                        document.getElementById('dynamic-content').innerHTML = response;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching content:", status, error);
                        // Handle errors
                        document.getElementById('dynamic-content').innerHTML = "<p>Error loading content.</p>"
                    }
                });
                break;

            default:
                document.getElementById('content').innerHTML = '<h1>Welcome to the Employee Dashboard</h1>';
        }
    }
    </script>
</body>
</html>