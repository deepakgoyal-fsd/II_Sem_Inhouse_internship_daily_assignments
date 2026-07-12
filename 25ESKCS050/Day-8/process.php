<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


include "header.php";



// Grade Function

function calculateGrade($cgpa){


if($cgpa>=9){

return "A+";

}

elseif($cgpa>=8){

return "A";

}

elseif($cgpa>=7){

return "B";

}

else{

return "C";

}


}





$errors=[];




$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$branch=$_POST['branch'];

$college=$_POST['college'];

$cgpa=$_POST['cgpa'];

$gender=$_POST['gender'] ?? "";

$course=$_POST['course'];

$address=$_POST['address'];





// Name validation

if(empty($name)){


$errors[]="Name is required";


}





// Email validation

if(empty($email)){


$errors[]="Email is required";


}

elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){


$errors[]="Invalid Email Address";


}






// Phone validation

if(empty($phone)){


$errors[]="Phone number required";


}

elseif(strlen($phone)!=10){


$errors[]="Phone number must contain 10 digits";


}






// Other validations

if(empty($branch)){


$errors[]="Branch required";


}



if(empty($college)){


$errors[]="College required";


}




if(empty($cgpa)){


$errors[]="CGPA required";


}




if(empty($gender)){


$errors[]="Please select gender";


}





if(empty($course)){


$errors[]="Please select course";


}




if(empty($address)){


$errors[]="Address required";


}







// Show errors


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





// Success Card


else{


$grade=calculateGrade($cgpa);


?>




<div class="card p-5 text-center">


<i class="fa-solid fa-user-graduate fa-5x text-primary mb-3">

</i>



<h2 class="text-success">

Registration Successful ✅

</h2>



<hr>




<h3>

<?php echo $name; ?>

</h3>




<p>

📧 Email :

<?php echo $email; ?>

</p>





<p>

📞 Phone :

<?php echo $phone; ?>

</p>





<p>

🏫 College :

<?php echo $college; ?>

</p>





<p>

💻 Branch :

<?php echo $branch; ?>

</p>





<p>

📚 Course :

<?php echo $course; ?>

</p>





<p>

📍 Address :

<?php echo $address; ?>

</p>





<p>

⭐ CGPA :

<?php echo $cgpa; ?>

</p>





<h3>

Grade :

<span class="badge bg-success">

<?php echo $grade; ?>

</span>


</h3>





<p class="mt-3">

📅 Submitted On :

<?php

echo date("d-m-Y");

?>

</p>





</div>





<?php


}



include "footer.php";


?>