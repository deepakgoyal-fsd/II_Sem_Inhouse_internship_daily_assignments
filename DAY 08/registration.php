<?php

$name=$_POST['name'];
$email=$_POST['email'];
$phoneNumber=$_POST['phoneNumber'];
$gender=$_POST['gender'];
$dob=$_POST['dtDOB'];

$errors=array();

if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
{
    $errors[]="Invalid Email Address";
}


if(strlen($phoneNumber)!=10)
{
    $errors[]="Phone Number must be 10 digits";
}

if(is_numeric($phoneNumber)==false)
{
    $errors[]="Phone Number should contain only numbers";
}


$folder="uploads/";

if(!is_dir($folder))
{
    mkdir($folder,0777,true);
}


$allowedTypes=array("jpg","jpeg","png","gif","webp");

$extension=strtolower(pathinfo($_FILES["myfile"]["name"],PATHINFO_EXTENSION));

$maxSize=20*1024*1024;


if(!in_array($extension,$allowedTypes))
{
    $errors[]="Invalid File Type";
}


if($_FILES["myfile"]["size"]>$maxSize)
{
    $errors[]="File Size Too Large";
}


if(count($errors)==0)
{
    move_uploaded_file(
        $_FILES["myfile"]["tmp_name"],
        $folder.$_FILES["myfile"]["name"]
    );
}


if(count($errors)>0)
{
    echo "<h2>Errors</h2>";

    foreach($errors as $error)
    {
        echo $error."<br>";
    }
}
else
{
    echo "<h2>Registration Successful</h2>";

    echo "Name : ".$name."<br>";
    echo "Email : ".$email."<br>";
    echo "Phone : ".$phoneNumber."<br>";
    echo "Gender : ".$gender."<br>";
    echo "Date of Birth : ".$dob."<br>";

    echo "Uploaded File : ".$_FILES["myfile"]["name"];
}

?>
