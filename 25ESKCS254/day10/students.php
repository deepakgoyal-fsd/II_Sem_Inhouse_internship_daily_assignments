<?php

$page = "";
include 'header.php';
include 'db_connect.php';

if (isset($_GET['success'])) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Student record added successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php
}

if (isset($_GET['updated'])) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Student record updated successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php
}

if (isset($_GET['deleted'])) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Student Deleted Successfully!</strong>
    <?php echo htmlspecialchars($_GET['deleted']); ?> has been removed.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php
}

if (isset($_GET['search']) && trim($_GET['search']) != "") {

    $search = mysqli_real_escape_string($conn, trim($_GET['search']));

    $sql = "SELECT * FROM students
            WHERE name LIKE '%$search%'
            OR branch LIKE '%$search%'
            OR email LIKE '%$search%'
            ORDER BY id DESC";

} else {

    $sql = "SELECT * FROM students
            ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
$totalStudents = mysqli_num_rows($result);

?>

<div class="row justify-content-center">

    <div class="col-lg-11">

        <div class="card shadow">

            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    <i class="fa-solid fa-users"></i>
                    Student Management System
                </h3>

                <span class="badge bg-primary fs-6">
                    Total Students :
                    <?php echo $totalStudents; ?>
                </span>

            </div>

            <div class="card-body">

                <form method="GET" action="students.php" class="mb-3">

                    <div class="row">

                        <div class="col-md-10">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search by Name, Branch or Email"
                                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

                        </div>

                        <div class="col-md-2">

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="fa-solid fa-magnifying-glass"></i>

                                Search

                            </button>

                        </div>

                    </div>

                </form>

                <?php if ($totalStudents > 0) { ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover align-middle">

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
                                <th width="180">Action</th>

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

            <?php
            if (!empty($row['photo'])) {
                echo htmlspecialchars($row['photo']);
            } else {
                echo "Not Uploaded";
            }
            ?>

        </span>

    </td>

    <td>

        <?php echo $row['date_registered']; ?>

    </td>

    <td>

        <a href="edit.php?id=<?php echo $row['id']; ?>"
           class="btn btn-warning btn-sm">

            <i class="fa-solid fa-pen-to-square"></i>

            Edit

        </a>

        <a href="delete.php?id=<?php echo $row['id']; ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Are you sure you want to delete this student?');">

            <i class="fa-solid fa-trash"></i>

            Delete

        </a>

    </td>

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

<div class="alert alert-warning text-center">

    <h5>No Students Found</h5>

    <p class="mb-0">

        Register a student to get started.

    </p>

</div>

<?php

}

?>

<div class="mt-3">

    <a href="index.php" class="btn btn-primary">

        <i class="fa-solid fa-user-plus"></i>

        Register New Student

    </a>

</div>

</div>

</div>

</div>

</div>

<?php

mysqli_close($conn);

include 'footer.php';

?>