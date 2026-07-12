<?php

include "header.php";

include "db.php";



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





$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$branch=$_POST['branch'];

$college=$_POST['college'];

$cgpa=$_POST['cgpa'];

$gender=$_POST['gender'];

$course=$_POST['course'];

$address=$_POST['address'];

$photo="profile.png";





$sql="INSERT INTO students
(name,email,phone,branch,college,cgpa,gender,course,address,photo)

VALUES

('$name','$email','$phone','$branch','$college','$cgpa','$gender','$course','$address','$photo')";







if(mysqli_query($conn,$sql)){


$grade=calculateGrade($cgpa);


?>



<div class="card p-5 text-center">


<i class="fa-solid fa-user-graduate fa-5x text-primary"></i>


<h1 class="text-success mt-3">

Registration Successful ✅

</h1>


<hr>



<h3>

<?php echo $name; ?>

</h3>




<p>

Email : <?php echo $email; ?>

</p>



<p>

Phone : <?php echo $phone; ?>

</p>




<p>

College : <?php echo $college; ?>

</p>




<p>

Branch : <?php echo $branch; ?>

</p>



<p>

Course : <?php echo $course; ?>

</p>



<p>

Address : <?php echo $address; ?>

</p>




<h3>

CGPA : <?php echo $cgpa; ?>

</h3>




<h3>

Grade:

<span class="badge bg-success">

<?php echo $grade; ?>

</span>

</h3>




<p>

Date:

<?php echo date("d-m-Y"); ?>

</p>



</div>



<?php


}

else{


echo "<h2>Database Error</h2>";

}



include "footer.php";


?>