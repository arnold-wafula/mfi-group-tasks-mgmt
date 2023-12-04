<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>

        <!--Bootstrap CSS CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="bg-dark">
        <div class="container mt-5">
            <form method="POST" action="{{ route('login.authenticate') }}" class="col-md-6 mx-auto bg-white p-4 rounded">
                @csrf
                <!-- Logo image -->
                <div class="text-center mb-4">
                    <img src="mfi.jpg" width="50px" height="50px" alt="Logo">
                </div>

                <div class="form-group">
                    <label for="employee_id">Employee ID</label>
                    <input type="text" name="employee_id" class="form-control" placeholder="M-108"/>
                    @if($errors->has('employee_id'))
                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="*******">
                    @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>

                <div class="mt-3">
                    <p>Don't have a tasks account? Register <a href="{{ route('register') }}">here</a></p>
                </div>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (required for Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>