<?php
include "db.php";

$result = $conn->query(
    "SELECT * FROM students ORDER BY cgpa DESC"
);

$total = $result->num_rows;
?>

<!DOCTYPE html>
<html>
<head>

<title>Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand">🎓 Student Portal</a>

        <a href="index.php"
           class="btn btn-warning">
           Register
        </a>

    </div>
</nav>

<div class="container mt-5">

<h2>Student Records</h2>

<div class="alert alert-info">
    Total: <?= $total ?> students
</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>CGPA</th>
    <th>Branch</th>
</tr>

</thead>

<tbody>

<?php while($row = $result->fetch_assoc()): ?>

<tr class="<?= $row['cgpa'] >= 9 ? 'table-success' : '' ?>">

    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= $row['cgpa'] ?></td>
    <td><?= htmlspecialchars($row['branch']) ?></td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</body>
</html>