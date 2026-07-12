<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
    body{
        background:#f2f2f2;
        font-family:Arial; 
    }
    .container{
        width:400px;
        margin:80px auto;
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0px 0px 10px gray;
    }
    h2{
        text-align:center;
        margin-bottom:20px;
    }
    input{
        width:100%;
        padding:12px;
        margin:10px 0;
        border:1px solid gray;
        border-radius:5px;
    }
    button{
        width:100%;
        padding:12px;
        background:#007bff;
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
    }
    button:hover{
        background:#0056b3;
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="check_admin_login.php" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>