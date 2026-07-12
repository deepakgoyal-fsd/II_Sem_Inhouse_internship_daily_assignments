<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location: login.php");

}

include("db_connect.php");

$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$phone=$_POST['phone'];

if($_FILES['photo']['name']!=""){

$photo=$_FILES['photo']['name'];

move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);

mysqli_query($conn,"UPDATE students SET

name='$name',

email='$email',

branch='$branch',

phone='$phone',

photo='$photo'

WHERE id=$id");

}

else{

mysqli_query($conn,"UPDATE students SET

name='$name',

email='$email',

branch='$branch',

phone='$phone'

WHERE id=$id");

}

header("Location: students.php");

?>