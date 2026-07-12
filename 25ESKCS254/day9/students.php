<?php

$page = "";
include 'header.php';
include 'db_connect.php';

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$totalStudents = mysqli_num_rows($result);

?>

<div class="row justify-content-center">

    <div class="col-lg-11">

        <div class="card shadow">

            <div class="card-header bg-dark text-white d-flex justify-content-between">

                <h3 class="mb-0">
                    Student Records
                </h3>

                <span class="badge bg-primary fs-6">
                    Total Students :
                    <?php echo $totalStudents; ?>
                </span>

            </div>

            <div class="card-body">

                <?php

                if ($totalStudents > 0) {

                ?>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Branch</th>
                                    <th>CGPA</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Course</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Date Registered</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                while ($row = mysqli_fetch_assoc($result)) {

                                    $rowClass = "";

                                    if ($row['cgpa'] > 8) {

                                        $rowClass = "table-success";
                                    }

                                ?>

                                    <tr class="<?php echo $rowClass; ?>">

                                        <td><?php echo $row['id']; ?></td>

                                        <td><?php echo htmlspecialchars($row['name']); ?></td>

                                        <td><?php echo htmlspecialchars($row['email']); ?></td>

                                        <td><?php echo htmlspecialchars($row['branch']); ?></td>

                                        <td><?php echo htmlspecialchars($row['cgpa']); ?></td>

                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>

                                        <td><?php echo htmlspecialchars($row['city']); ?></td>

                                        <td><?php echo htmlspecialchars($row['course']); ?></td>

                                        <td><?php echo htmlspecialchars($row['address']); ?></td>

                                        <td>

                                            <span class="badge bg-secondary">

                                                <?php echo htmlspecialchars($row['photo']); ?>

                                            </span>

                                        </td>

                                        <td>

                                            <?php echo $row['date_registered']; ?>

                                        </td>

                                        <td><?php echo $row['updated_at']; ?></td>

                                    </tr>

                                <?php

                                }

                                ?>

                            </tbody>

                        </table>

                    </div>

                <?php

                } else {

                ?>

                    <div class="alert alert-warning">

                        No student records found.

                    </div>

                <?php

                }

                ?>

                <a href="index.php" class="btn btn-primary">

                    Register New Student

                </a>

            </div>

        </div>

    </div>

</div>

<?php

mysqli_close($conn);

include 'footer.php';

?>