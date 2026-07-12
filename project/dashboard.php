<?php

session_start();


if(!isset($_SESSION['admin']))
{

header("location:login.php");

}


include "config/database.php";


$books=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM books")
);


$members=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM members")
);


$issued=mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM issued_books WHERE status='Issued'")
);



$available=mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM books WHERE available_quantity>0")
);



?>


<?php include "includes/header.php"; ?>


<?php include "includes/sidebar.php"; ?>


<div class="main">


<?php include "includes/navbar.php"; ?>


<div class="container">


<h1>
Dashboard
</h1>


<br>


<div class="cards">


<div class="card">

<h3>
📚 Total Books
</h3>

<h1>
<?php echo $books; ?>
</h1>

</div>



<div class="card">

<h3>
👥 Members
</h3>

<h1>
<?php echo $members; ?>
</h1>

</div>




<div class="card">

<h3>
📖 Issued Books
</h3>

<h1>
<?php echo $issued; ?>
</h1>

</div>




<div class="card">

<h3>
✅ Available
</h3>

<h1>
<?php echo $available; ?>
</h1>

</div>


</div>



</div>


</div>


<?php include "includes/footer.php"; ?>