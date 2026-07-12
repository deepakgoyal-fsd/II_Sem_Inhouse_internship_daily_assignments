<?php

session_start();

include "db.php";


if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}


$countQuery = mysqli_query($conn,"SELECT COUNT(*) AS total FROM students");

$data = mysqli_fetch_assoc($countQuery);

$total = $data['total'];

?>


<?php include "header.php"; ?>



<div class="container mt-5">


<div class="card p-5 text-center shadow">


<h1>

👋 Welcome 

<?php

if(isset($_SESSION['name']))
{
    echo $_SESSION['name'];
}
else
{
    echo "User";
}

?>

</h1>



<br>



<h2>

📚 Student Management Dashboard

</h2>



<br>



<div class="alert alert-success">


Total Students : <?php echo $total; ?>


</div>




<a href="index.php" class="btn btn-primary mb-2">

➕ Add Student

</a>




<a href="students.php" class="btn btn-success mb-2">

📋 View Students

</a>




<a href="logout.php" class="btn btn-danger">

Logout

</a>



</div>


</div>



<?php include "footer.php"; ?>