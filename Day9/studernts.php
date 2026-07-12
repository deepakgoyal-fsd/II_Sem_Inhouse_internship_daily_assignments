<?php
include "db.php";

$sql = "SELECT * FROM students ORDER BY date_registered DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registered Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h2 class="text-center">

                <i class="bi bi-people-fill"></i>

                Registered Students

            </h2>

        </div>

        <div class="card-body">

            <div class="mb-3 text-end">

                <a href="index.php" class="btn btn-primary">

                    <i class="bi bi-person-plus-fill"></i>

                    Add New Student

                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Address</th>
                            <th>Date Registered</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                                echo "<tr>

                                    <td>{$row['id']}</td>

                                    <td>{$row['name']}</td>

                                    <td>{$row['email']}</td>

                                    <td>{$row['phone']}</td>

                                    <td>{$row['gender']}</td>

                                    <td>{$row['course']}</td>

                                    <td>{$row['address']}</td>

                                    <td>{$row['date_registered']}</td>

                                </tr>";

                            }

                        } else {

                            echo "<tr>

                                    <td colspan='8' class='text-center text-danger'>

                                        No Students Registered

                                    </td>

                                  </tr>";

                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>
