<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}
include("header.php");
include("db_connect.php");
$id = $_SESSION["id"];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>
<style>
    body{
        background:#f2f2f2;
        font-family:Arial, Helvetica, sans-serif;
    }
    .container{
        width:600px;
        margin:40px auto;
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0px 0px 10px gray;
    }
    h1{
        text-align:center;
        margin-bottom:25px;
        color:#007bff;
    }
table{

    width:100%;
    border-collapse:collapse;

}

table td{

    padding:15px;
    border-bottom:1px solid #ddd;
    font-size:17px;

}

.label{

    font-weight:bold;
    width:180px;

}

.btn{

    display:block;
    width:180px;
    margin:30px auto;
    text-align:center;
    background:#007bff;
    color:white;
    padding:12px;
    text-decoration:none;
    border-radius:5px;

}

.btn:hover{

    background:#0056b3;

}

</style>

</head>

<body>

<div class="container">

<h1>My Profile</h1>

<table>

<tr>
<td class="label">Full Name</td>
<td><?php echo $row["fullname"]; ?></td>
</tr>

<tr>
<td class="label">Username</td>
<td><?php echo $row["username"]; ?></td>
</tr>

<tr>
<td class="label">Email</td>
<td><?php echo $row["email"]; ?></td>
</tr>

<tr>
<td class="label">Phone</td>
<td><?php echo $row["phone"]; ?></td>
</tr>

<tr>
<td class="label">Date of Birth</td>
<td><?php echo $row["dob"]; ?></td>
</tr>

<tr>
<td class="label">Address</td>
<td><?php echo $row["address"]; ?></td>
</tr>

<tr>
<td class="label">City</td>
<td><?php echo $row["city"]; ?></td>
</tr>

<tr>
<td class="label">State</td>
<td><?php echo $row["state"]; ?></td>
</tr>

</table>

<a href="edit_profile.php" class="btn">

Edit Profile

</a>

</div>

</body>

</html>

<?php
include("footer.php");
?>