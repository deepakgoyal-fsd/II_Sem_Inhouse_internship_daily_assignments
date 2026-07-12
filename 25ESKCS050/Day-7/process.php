<!DOCTYPE html>

<html>

<head>

<title>Result</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


</head>


<body>


<div class="container mt-5">


<?php


$errors=[];



$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$branch=$_POST['branch'];

$gender=$_POST['gender'] ?? "";

$course=$_POST['course'];

$address=$_POST['address'];





// Name Validation


if(empty($name)){


$errors[]="Name is required";


}
elseif(preg_match('/[0-9]/',$name)){


$errors[]="Name cannot contain numbers";


}





// Email


if(empty($email)){


$errors[]="Email is required";


}

elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){


$errors[]="Invalid Email";


}





// Phone


if(empty($phone)){


$errors[]="Phone required";


}

elseif(strlen($phone)!=10){


$errors[]="Phone must be 10 digits";


}





if(empty($branch)){


$errors[]="Branch required";


}



if(empty($gender)){


$errors[]="Select Gender";


}



if(empty($course)){


$errors[]="Select Course";


}



if(strlen($address)<10){


$errors[]="Enter proper address";


}




if(count($errors)>0){


echo "<div class='alert alert-danger'>";


foreach($errors as $error){


echo $error."<br>";


}


echo "</div>";



echo "<a href='index.php' class='btn btn-danger'>
Go Back
</a>";



}


else{


?>


<div class="card p-5 shadow">


<h2 class="text-success text-center">

Registration Successful ✅

</h2>


<hr>


<h4>
Name : <?php echo $name; ?>
</h4>


<p>
Email : <?php echo $email; ?>
</p>



<p>
Phone : <?php echo $phone; ?>
</p>



<p>
Branch : <?php echo $branch; ?>
</p>



<p>
Gender : <?php echo $gender; ?>
</p>



<p>
Course : <?php echo $course; ?>
</p>



<p>
Address : <?php echo $address; ?>
</p>



</div>


<?php

}

?>



</div>


</body>

</html>