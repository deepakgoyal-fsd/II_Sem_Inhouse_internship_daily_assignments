<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-Login</title>

    <link rel="stylesheet" href="register.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>


<body>

<div class="container">

    <div class="form-box">

        <h2>Welcome As Admin</h2>
        <p>Login to your admin account</p>

        <form action="admin_process.php" method="POST">

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>

            <button type="submit" name="login" class="btn">
                Login
            </button>
            <br><br>
            <button class="btn" type="button" onclick="window.location.href='dashboard.php'">Go to Home</button>

        </form>

        <p class="register-link">
            Don't have an account?
            <a href="register.php">Register</a>
        </p>
<br>
    
    </div>
    

</div>

</body>
</html>