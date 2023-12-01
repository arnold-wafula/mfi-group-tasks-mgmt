<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form method="POST" action="">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name"/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email"/>
        </div>
        <div>
            <label for="eid">Employee ID</label>
            <input type="text" name="eid" placeholder="23476271"/>
        </div>
        <div>
            <label for="dept">Department</label>
            <select name="department">
                <option value="sales">Sales</option>
                <option value="it">I.T</option>
                <option value="marketing">Marketing</option>
                <option value="hr">Human Resources</option>
            </select>
        </div>
        <div>
            <label for="name">Designation</label>
            <select name="designation" id="">
                <option value="junior">Junior</option>
                <option value="mid">Mid-level</option>
                <option value="senior">Senior</option>
            </select>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter password">
        </div>
        <div>
            <label for="repeat_password">Repeat Password</label>
            <input type="password" name="repeat_password" placeholder="Repeat Password">
        </div>

        <button type="submit">Log in</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>