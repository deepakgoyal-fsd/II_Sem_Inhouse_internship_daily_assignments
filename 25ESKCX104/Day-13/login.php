<?php
include("loginheader.php");
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        form {
            max-width: 500px;
            margin: 40px auto;
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }
        input{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: 0.3s;
        }
        input:focus{
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }
        button {
            width: 48%;
            padding: 10px;
            margin: 10px 1%;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
        }
        button:hover {
            transform: scale(1.05);
        }
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 20px;
            }
            button {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <h2>USER LOGIN</h2>
    <form action="checklogin.php" method="POST">
        <input type="text" name="username_email" placeholder="Type your username or email" required>
        <input type="password" name="password" placeholder="Type your password" required>
        <label>
        <input type="checkbox" name="rememberme">Remember Me
        </label>
        <button type="submit">Login</button>
        <p>
            Don't have account?
            <a href="registration.php">Register</a>
        </p>
    </form>
<?php
include("footer.php");
?>
</body>
</html>