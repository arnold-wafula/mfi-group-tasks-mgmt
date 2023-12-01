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
        <form method="POST" action="{{ route('register') }}" class="col-md-6 mx-auto bg-white p-4 rounded">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name"/>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"/>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="eid">Employee ID</label>
                <input type="text" name="eid" class="form-control" placeholder="23476271"/>
            </div>
            
            <div class="form-group">
                <label for="dept">Department</label>
                <select name="department">
                    <option value="sales">Sales</option>
                    <option value="it">I.T</option>
                    <option value="marketing">Marketing</option>
                    <option value="hr">Human Resources</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="name">Designation</label>
                <select name="designation" id="">
                    <option value="junior">Junior</option>
                    <option value="mid">Mid-level</option>
                    <option value="senior">Senior</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
                @if($errors->has('repeat_password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        
            <!--
            <div class="form-group">
                <label for="repeat_password">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password">
                @if($errors->has('repeat_password'))
                <span class="text-danger">{{ $errors->has('repeat_password') }}</span>
                @endif
            </div>
            -->
            
            <button type="submit" class="btn btn-primary">Log in</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js CDN (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>