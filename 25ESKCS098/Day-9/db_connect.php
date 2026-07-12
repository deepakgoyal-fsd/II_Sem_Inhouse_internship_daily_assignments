<?php

$host="localhost";

$user="root";

$password="";

$database="student_management";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn){

die("Connection Failed : ".mysqli_connect_error());

}

/* Uncomment for Mission 2 Bonus

echo "<div class='alert alert-success'>";

echo "Database Connected Successfully<br>";

echo mysqli_get_host_info($conn);

echo "</div>";

*/

?>