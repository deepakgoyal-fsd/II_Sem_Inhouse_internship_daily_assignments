<?php

$page="students";

include("header.php");
include("db_connect.php");

$id=$_GET['id'];

$sql="SELECT * FROM students WHERE id=$id";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<div class="card shadow p-4">

<h2 class="text-center mb-4">

Edit Student

</h2>

<form action="update.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $row['name']; ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<input
type="text"
name="branch"
class="form-control"
value="<?php echo $row['branch']; ?>"
required>

</div>

<div class="mb-3">

<label>CGPA</label>

<input
type="number"
step="0.1"
min="0"
max="10"
name="cgpa"
class="form-control"
value="<?php echo $row['cgpa']; ?>"
required>

</div>

<button
class="btn btn-success">

Update Student

</button>

<a
href="students.php"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

<?php

include("footer.php");

?>