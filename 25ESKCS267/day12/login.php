<?php
session_start();
require "database.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $username = trim($_POST["username"]);
$password = trim($_POST["password"]);

if (empty($username) || empty($password)) {
    die("Username and Password are required.");
}

$sql="SELECT * FROM user WHERE username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
  if(password_verify($password,$row["password"])){

    $_SESSION["student_id"] = $row["id"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["email"] = $row["email"];   // optional

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
    <div style="
max-width:420px;
margin:60px auto;
background:white;
padding:35px;
border-radius:12px;
box-shadow:0 5px 20px rgba(0,0,0,.15);
font-family:Arial,sans-serif;">

    <h2 style="
    text-align:center;
    color:#2563eb;
    margin-bottom:30px;">
        Login
    </h2>

    <form id="loginForm" method="post" action="login.php">

        <label style="font-weight:bold;">
            Username
        </label>

        <input
        id="loginUser"
        type="text"
        name="username"
        placeholder="Enter Your Username"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        margin-bottom:20px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">
        <p class="login-user-error"
style="color:red;margin:5px 0 15px 0;"></p>

        <label style="font-weight:bold;">
            Password
        </label>

        <input
        id="loginPass"
        type="password"
        name="password"
        placeholder="Enter Your Password"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        margin-bottom:30px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">
        <p class="login-pass-error"
style="color:red;margin:5px 0 20px 0;"></p>

        <button
        type="submit"
        name="login"

        style="
        width:100%;
        background:#2563eb;
        color:white;
        border:none;
        padding:14px;
        border-radius:8px;
        font-size:18px;
        font-weight:bold;
        cursor:pointer;"
         onmouseover="this.style.color='#4f0720'"
onmouseout="this.style.color='white'">
            Login
        </button>

    </form>

    <p style="
    text-align:center;
    margin-top:25px;
    color:#555;">
        Don't have an account?
        <a href="index.php"
        style="
        color:#2563eb;
        text-decoration:none;
        font-weight:bold;"
    >
            Register Here
        </a>
    </p>

</div>

<?php require "footer.php"; ?>