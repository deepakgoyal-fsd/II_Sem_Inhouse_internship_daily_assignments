<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">Student Records</h2>

    <a href="registration.php" class="btn btn-primary mb-3">
        Add New Student
    </a>

    <table class="table table-bordered table-hover table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>CGPA</th>
            </tr>
        </thead>

        <tbody>

        <?php

        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['branch']."</td>";
                echo "<td>".$row['cgpa']."</td>";
                echo "</tr>";

            }

        } else {

            echo "<tr>
                    <td colspan='5' class='text-center'>
                        No Student Found
                    </td>
                  </tr>";

        }

        mysqli_close($conn);

        ?>

        </tbody>

    </table>

</div>

</body>
</html>