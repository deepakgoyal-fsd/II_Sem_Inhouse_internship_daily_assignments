<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>
<?php

$page = "";
include 'header.php';
include 'db_connect.php';

if (isset($_GET['updated'])) {

?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <strong>Success!</strong> Student record updated successfully.

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

<?php

}
if (isset($_GET['deleted'])) {

?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <strong>Student Deleted Successfully!</strong>

    <?php echo htmlspecialchars($_GET['deleted']); ?> has been removed.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php

}

if (isset($_GET['search']) && $_GET['search'] != "") {

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM students
            WHERE
            name LIKE '%$search%'
            OR branch LIKE '%$search%'
            OR course LIKE '%$search%'
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

            <div class="card-header bg-dark text-white d-flex justify-content-between">

<h3 class="mb-0">

<i class="fa-solid fa-users"></i>

Student Management System

</h3>
               <span class="badge bg-success fs-6">

Showing

<?php echo $totalStudents; ?>

Students

</span>

            </div>

            <div class="card-body">

                <?php

                if ($totalStudents > 0) {

                ?>
                <form method="GET" action="students.php" class="mb-3">

    <div class="row">

        <div class="col-md-10">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search by Name or Branch or course"
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

        </div>

        <div class="col-md-2">

            <button
                type="submit"
                class="btn btn-primary w-100">

                Search

            </button>

        </div>

    </div>

</form>

                  

<div class="table-responsive">

<table class="table table-bordered table-hover table-striped align-middle">



                            <thead class="table-dark">

                                <tr>
<th>Photo</th>
                                    <th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>CGPA</th>
<th>Phone</th>
<th>City</th>
<th>Course</th>
<th>Address</th>
<th>Last Updated</th>
<th>Date Registered</th>
<th width="170">Action</th>

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
                                        <td>

<?php

$image = "assets/default.png";

if (!empty($row['photo']) && file_exists("uploads/" . $row['photo'])) {

    $image = "uploads/" . $row['photo'];

}

?>

<img
src="<?php echo $image; ?>"
width="60"
height="60"
class="rounded-circle border"
style="object-fit:cover;">

</td>

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
                                     <td>

<div class="d-flex gap-2">

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

</div>

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

                   <div class="alert alert-warning text-center">

<h5>

No Students Found matching your search

</h5>

<p class="mb-0">

Try another search or register a new student.

</p>

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