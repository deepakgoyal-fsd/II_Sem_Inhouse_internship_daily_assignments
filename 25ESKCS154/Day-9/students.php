<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h2>Student Records</h2>
        <table class="table table-bordered table-hover">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>CGPA</th>
            </tr>
            <?php
            $r = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($r)) {
                $c = $row['cgpa'] > 8 ? 'table-success' : '';
                echo "<tr class='$c'><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['branch']}</td><td>{$row['cgpa']}</td></tr>";
            }
            echo "</table><h5>Total Students: " . mysqli_num_rows($r) . "</h5>";
            ?>
            <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</body>

</html>