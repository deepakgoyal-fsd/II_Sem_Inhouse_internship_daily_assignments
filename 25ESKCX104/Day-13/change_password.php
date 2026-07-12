<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}
include("header.php");
include("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<style>
    body{
        background:#f2f2f2;
        font-family:Arial;
    }
    .container{
        width:450px;
        margin:40px auto;
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
        margin:12px 0;
        border:1px solid #ccc;
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
        <h2>Change Password</h2>
        <form action="update_password.php" method="POST">
            <input type="password" name="old_password" placeholder="Enter Old Password" required>
            <input type="password" name="new_password" placeholder="Enter New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
            <button type="submit">Update Password</button>
        </form>
    </div>
</body>
</html>
<?php
include("footer.php");
?>
