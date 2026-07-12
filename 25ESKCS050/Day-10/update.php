<?php

include "db.php";


$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$course=$_POST['course'];

$cgpa=$_POST['cgpa'];

$status=$_POST['status'];




$sql="UPDATE students SET

name='$name',

email='$email',

branch='$branch',

course='$course',

cgpa='$cgpa',

status='$status'

WHERE id=$id";




if(mysqli_query($conn,$sql)){


header("Location: students.php");


}

else{


echo "Update Failed";


}


?>