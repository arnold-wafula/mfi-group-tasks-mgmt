<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
<form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div>
            <label for="eid">Employee ID</label>
            <input type="text" name="eid" placeholder="23476271"/>
            @if($errors->has('eid'))
            <span>{{ $errors->first('eid') }}</span>
            @endif
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter password">
            @if($errors->has('password'))
            <span>{{ $errors->first('password') }}</span>
            @endif
        </div>
        <button type="submit">Register</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>