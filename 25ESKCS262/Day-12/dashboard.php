<?php
session_start();

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
?>

<?php require "header.php"; ?>

<div style="
max-width:700px;
margin:60px auto;
background:#fff;
padding:40px;
border-radius:15px;
box-shadow:0 8px 25px rgba(0,0,0,0.15);
font-family:Arial,sans-serif;
text-align:center;">

    <h1 style="
    color:#2563eb;
    margin-bottom:10px;
    font-size:38px;">
        Welcome, <?php echo $username; ?> 
    </h1>

    <p style="
    color:#555;
    font-size:18px;
    margin-bottom:35px;">
        You have successfully logged in.
    </p>

    <a href="add_details.php"
    style="
    display:block;
    width:80%;
    margin:15px auto;
    padding:15px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;
    transition:.3s;">
        ➕ Add Details
    </a>

    <a href="see_details.php"
    style="
    display:block;
    width:80%;
    margin:15px auto;
    padding:15px;
    background:#10b981;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;">
        👤 View Profile
    </a>

    <a href="logout.php"
    style="
    display:block;
    width:80%;
    margin:15px auto;
    padding:15px;
    background:#ef4444;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;">
        🚪 Logout
    </a>

</div>

<?php require "footer.php"; ?>