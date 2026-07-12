<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "student_portal";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn)
{
    die("Connection Failed : " . mysqli_connect_error());
}

?>

<div class="container mt-3">

<div class="alert alert-success">

<strong>Database Connected Successfully!</strong>

<br>

<?php

echo "Server : " . mysqli_get_host_info($conn);

?>

</div>

</div>