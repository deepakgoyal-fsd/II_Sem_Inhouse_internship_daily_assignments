<?php
session_start();
require "database.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];

$sql="SELECT * FROM user WHERE username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){
        
        $_SESSION["username"] = $row["username"];
        header("Location: dashboard.php");
        exit();
    }else{
        die("Error: ");
    }
}else{
    echo"User not found";
}
}

?>
    <?php require "header.php"; ?>
    <form class="form" method="post" action="login.php">
        <div class="form-container">
            <div class="user-container">
                <label for="user">
                    Username
                </label>
                <input name="username" type="text" id="user" placeholder="Enter Your Username">
            </div>
            <div class="pass-container">
                <label for="pass">
                    Password
                </label>
                <input name="password" type="password" id="pass" placeholder="Enter Your Password">
            </div>
            <div>
                <button name="login">Log In</button>
            </div>
        </div>
    </form>
<?php require "footer.php";