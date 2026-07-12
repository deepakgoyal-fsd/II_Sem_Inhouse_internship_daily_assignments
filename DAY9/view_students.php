<?php
include "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }
        .navbar{
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
        }
        .table{
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }
        .topper{
            background:#d4edda !important;
            font-weight:bold;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">🎓 Student Registration Portal</span>
        <a href="index.php" class="btn btn-warning">+ Add Student</a>
    </div>
</nav>

<div class="container mt-5">

<?php
$countQuery = mysqli_query($conn,"SELECT COUNT(*) AS total FROM students");
$countRow = mysqli_fetch_assoc($countQuery);
?>

<div class="alert alert-primary">
    <h5>Total Students : <?php echo $countRow['total']; ?></h5>
</div>

<div class="card">
<div class="card-header bg-primary text-white">
    <h4>Registered Students</h4>
</div>

<div class="card-body">

<table class="table table-bordered table-hover text-center">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Course</th>
    <th>CGPA</th>
</tr>
</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $class="";

        if($row['cgpa']>=9)
        {
            $class="topper";
        }

        echo "<tr class='$class'>";

        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['course']."</td>";
        echo "<td>".$row['cgpa']."</td>";

        echo "</tr>";
    }
}
else
{
    echo "<tr>
            <td colspan='6' class='text-danger'>
                No Students Found
            </td>
          </tr>";
}

?>

</tbody>

</table>

</div>
</div>

</div>

</body>
</html>