<?php

session_start();

include 'functions.php';

if(!isset($_SESSION['student']))
{
    header("Location:index.php");
    exit();
}

$data=$_SESSION['student'];

include 'header.php';

?>
<h2>
<?php
echo greeting().", ".$data['name'];
?>
</h2>

<p><?php echo todayDate(); ?></p>

<p><b>Email :</b> <?php echo $data['email']; ?></p>

<p><b>Branch :</b> <?php echo $data['branch']; ?></p>

<p><b>College :</b> <?php echo $data['college']; ?></p>

<p><b>CGPA :</b> <?php echo $data['cgpa']; ?></p>

<p><b>Performance :</b>
<?php
echo grade($data['cgpa']);
?>
</p>

<a href="index.php" class="btn btn-primary">
Register Again
</a>

<?php

unset($_SESSION['student']);

include 'footer.php';

?>