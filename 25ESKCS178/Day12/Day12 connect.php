<?php

$conn=new mysqli("localhost","root","","feedback_db");

if($conn->connect_error){

die("Connection Failed");

}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=$_POST["name"];

$email=$_POST["email"];

$course=$_POST["course"];

$rating=$_POST["rating"];

$feedback=$_POST["feedback"];

$stmt=$conn->prepare("INSERT INTO feedback(name,email,course,rating,feedback) VALUES(?,?,?,?,?)");

$stmt->bind_param("sssis",$name,$email,$course,$rating,$feedback);

$stmt->execute();

echo "<h2>Feedback Submitted Successfully</h2>";

$stmt->close();

$conn->close();

}

?>
