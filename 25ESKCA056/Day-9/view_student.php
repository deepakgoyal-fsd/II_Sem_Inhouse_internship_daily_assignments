<?php
include("db_connect.php");

$query = "SELECT id, first_name, last_name, email, mobile, gender, dob, city, course FROM student";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Student Details</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>City</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['first_name']); ?></td>
                <td><?= htmlspecialchars($row['last_name']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['mobile']); ?></td>
                <td><?= htmlspecialchars($row['gender']); ?></td>
                <td><?= htmlspecialchars($row['dob']); ?></td>
                <td><?= htmlspecialchars($row['city']); ?></td>
                <td><?= htmlspecialchars($row['course']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>