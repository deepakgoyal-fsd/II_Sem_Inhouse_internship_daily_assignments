<?php

$page = "";
include 'header.php';
include 'db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: students.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-danger'>Student not found.</div>";
    include 'footer.php';
    exit();
}

$row = mysqli_fetch_assoc($result);

?>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow">

            <div class="card-header bg-warning">

                <h3>Edit Student Details</h3>

            </div>

            <div class="card-body">

                <form action="update.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="mb-3">

                        <label class="form-label">Student Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['name']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['email']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Branch</label>

                        <input
                            type="text"
                            name="branch"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['branch']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">CGPA</label>

                        <input
                            type="number"
                            step="0.1"
                            name="cgpa"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['cgpa']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Phone</label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['phone']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">City</label>

                        <input
                            type="text"
                            name="city"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['city']); ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Course</label>

                        <input
                            type="text"
                            name="course"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['course']); ?>">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Address</label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"><?php echo htmlspecialchars($row['address']); ?></textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success">

                        Update Student

                    </button>

                    <a
                        href="students.php"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php

include 'footer.php';

?>