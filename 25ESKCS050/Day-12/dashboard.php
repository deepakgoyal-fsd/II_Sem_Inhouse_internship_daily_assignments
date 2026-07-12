<?php

include "auth.php";

include "db.php";

include "header.php";


$total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM students");

$data=mysqli_fetch_assoc($total);


?>


<div class="container mt-5">


<div class="card shadow p-5 text-center">


<h1>

👋 Welcome 

<?php

if(isset($_SESSION['user_name'])){

    echo $_SESSION['user_name'];

}
else{

    echo "User";

}

?>

</h1>



<h3 class="mt-4">

📚 Student Management Dashboard

</h3>



<div class="alert alert-success mt-4">


Total Students : 


<?php

echo $data['total'];

?>


</div>




<a href="index.php" class="btn btn-primary">

➕ Add Student

</a>



<a href="students.php" class="btn btn-success">

📋 View Students

</a>




<a href="logout.php" class="btn btn-danger">

Logout

</a>




</div>


</div>



<?php

include "footer.php";


?>