<?php

session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location: admin_login.php");
    exit();
}

include("db_connect.php");

$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>

<title>View Users</title>

<style>

body{
    background:#f2f2f2;
    font-family:Arial;
}

h1{
    text-align:center;
    margin:30px;
}

table{

    width:95%;
    margin:auto;
    border-collapse:collapse;
    background:white;

}

th,td{

    border:1px solid #ddd;
    padding:12px;
    text-align:center;

}

th{

    background:#007bff;
    color:white;

}

tr:nth-child(even){

    background:#f8f8f8;

}

</style>

</head>

<body>

<h1>Registered Users</h1>

<table>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Username</th>
<th>Email</th>
<th>Phone</th>
<th>City</th>
<th>State</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td><?php echo $row["fullname"]; ?></td>

<td><?php echo $row["username"]; ?></td>

<td><?php echo $row["email"]; ?></td>

<td><?php echo $row["phone"]; ?></td>

<td><?php echo $row["city"]; ?></td>

<td><?php echo $row["state"]; ?></td>

</tr>

<?php

}

?>

</table>

</body>

</html>