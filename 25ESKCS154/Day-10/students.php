<?php include 'db.php'; ?>
<!DOCTYPE html><html><head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script>
function confirmDelete(id){
 if(confirm('Are you sure you want to delete this record?')){
   window.location='delete.php?id='+id;
 }
}
</script>
</head><body>
<div class="container py-4">
<h2>Students</h2>
<form class="mb-3" method="GET">
<input class="form-control" name="search" placeholder="Search name or branch">
</form>
<?php
$s=$_GET['search']??'';
$safe=mysqli_real_escape_string($conn,$s);
$sql=$s? "SELECT * FROM students WHERE name LIKE '%$safe%' OR branch LIKE '%$safe%'":"SELECT * FROM students";
$r=mysqli_query($conn,$sql);
echo "<span class='badge bg-primary mb-2'>Total: ".mysqli_num_rows($r)."</span>";
echo "<table class='table table-bordered table-hover table-striped'><tr><th>ID</th><th>Name</th><th>Branch</th><th>CGPA</th><th>Action</th></tr>";
if(mysqli_num_rows($r)==0){echo "<tr><td colspan='5'>No students found.</td></tr>";}
while($row=mysqli_fetch_assoc($r)){
echo "<tr".($row['cgpa']>8?" class='table-success'":"").">";
echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['branch']}</td><td>{$row['cgpa']}</td>";
echo "<td><a class='btn btn-warning btn-sm' href='edit.php?id={$row['id']}'>Edit</a> <button class='btn btn-danger btn-sm' onclick='confirmDelete({$row['id']})'>Delete</button></td></tr>";
}
echo "</table>";
?>
</div></body></html>