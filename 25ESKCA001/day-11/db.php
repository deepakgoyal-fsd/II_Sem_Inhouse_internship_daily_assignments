<?php

$conn = mysqli_connect("localhost","root","","student_login");

if(!$conn){
    die("Connection Failed");
}

$result = mysqli_query($conn,"SELECT * FROM users");

while($row = mysqli_fetch_assoc($result)){
    echo $row["email"];
    echo "<br>";
}

?>