<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!--Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <form method="POST" action="{{ route('register.store') }}" class="col-md-6 mx-auto bg-white p-4 rounded">
            @csrf
            <!-- Logo image -->
            <div class="text-center mb-4">
                <img src="mfi.jpg" width="50px" height="50px" alt="Logo">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="John Doe"/>
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="john.doe@mfi.com"/>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="text" name="employee_id" class="form-control" placeholder="M-108"/>
                @if ($errors->has('employee_id'))
                <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                @endif
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <select name="department" class="form-control">
                        <option value="marketing">Marketing</option>
                        <option value="finance">Finance</option>
                        <option value="sales">Sales</option>
                        <option value="it">I.T</option>
                        <option value="opm">Operations Management</option>
                        <option value="hr">Human Resource</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="designation">Designation</label>
                    <select name="designation" class="form-control">
                        <option value="junior">Junior</option>
                        <option value="mid">Mid-level</option>
                        <option value="senior">Senior</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="*******">
                @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="*******">
                @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Register</button>

            <div class="mt-3">
                <p>Already have a tasks account? Log in <a href="{{ route('login.authenticate') }}">here</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js CDN (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>