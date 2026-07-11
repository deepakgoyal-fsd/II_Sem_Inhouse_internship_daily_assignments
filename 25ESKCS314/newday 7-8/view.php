<?php

$conn = mysqli_connect("localhost","root","","student_db");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
    echo "ID : ".$row['id']."<br>";
    echo "Name : ".$row['name']."<br>";
    echo "College : ".$row['college']."<br>";
    echo "Branch : ".$row['branch']."<br>";

    echo "<hr>";
}

mysqli_close($conn);

?>