<?php 
$page = "home"; 
include 'header.php'; 
include 'db_connect.php'; 

$id = $name = $email = $phone = $cgpa = $branch = $gender = $address = "";
$is_edit = false;

// ---- 1. DELETE LOGIC ----
if (isset($_GET['delete_id'])) {
    $del_id = intval($_GET['delete_id']);
    mysqli_query($conn, "DELETE FROM students WHERE id = $del_id");
    header("Location: index.php"); exit();
}

// ---- 2. FETCH FOR EDIT LOGIC ----
if (isset($_GET['edit_id'])) {
    $id = intval($_GET['edit_id']);
    $res = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
    if ($row = mysqli_fetch_assoc($res)) {
        $name = $row['name']; $email = $row['email']; $phone = $row['phone'];
        $cgpa = $row['cgpa']; $branch = $row['branch']; $gender = $row['gender'];
        $address = $row['address']; $is_edit = true;
    }
}

// ---- 3. INSERT OR UPDATE LOGIC ----
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $email = mysqli_real_escape_string($conn, $_POST['student_email']);
    $phone = mysqli_real_escape_string($conn, $_POST['student_phone']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['student_cgpa']);
    $branch = mysqli_real_escape_string($conn, $_POST['student_course']);
    $gender = mysqli_real_escape_string($conn, $_POST['student_gender']);
    $address = mysqli_real_escape_string($conn, $_POST['student_address']);

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update Query
        $edit_id = intval($_POST['id']);
        mysqli_query($conn, "UPDATE students SET name='$name', email='$email', phone='$phone', branch='$branch', cgpa='$cgpa', gender='$gender', address='$address' WHERE id=$edit_id");
    } else {
        // Insert Query (Duplicate Email Check Attached)
        $check = mysqli_query($conn, "SELECT id FROM students WHERE email='$email'");
        if (mysqli_num_rows($check) == 0) {
            mysqli_query($conn, "INSERT INTO students (name, email, phone, branch, cgpa, gender, address) VALUES ('$name', '$email', '$phone', '$branch', '$cgpa', '$gender', '$address')");
        }
    }
    header("Location: index.php"); exit();
}

// ---- 4. SEARCH SEARCH LOGIC ----
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$sql = "SELECT * FROM students ORDER BY id DESC";
if (!empty($search)) {
    $sql = "SELECT * FROM students WHERE name LIKE '%$search%' OR branch LIKE '%$search%' OR email LIKE '%$search%' ORDER BY id DESC";
}
$result = mysqli_query($conn, $sql);
?>

<div class="container my-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header <?php echo $is_edit ? 'bg-warning text-dark' : 'gradient-header text-white'; ?> py-3 fw-bold">
                    <i class="fa-solid <?php echo $is_edit ? 'fa-user-pen' : 'fa-user-plus'; ?> me-2"></i><?php echo $is_edit ? 'Edit Student Profile' : 'Student Registration'; ?>
                </div>
                <div class="card-body p-3">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Full Name</label>
                            <input type="text" name="student_name" class="form-control form-control-sm" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Email Address</label>
                            <input type="email" name="student_email" class="form-control form-control-sm" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Phone Number</label>
                            <input type="text" name="student_phone" class="form-control form-control-sm" value="<?php echo $phone; ?>" required>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label small fw-semibold mb-1">CGPA</label>
                                <input type="number" step="0.01" name="student_cgpa" class="form-control form-control-sm" value="<?php echo $cgpa; ?>" min="0" max="10" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold mb-1">Branch</label>
                                <select name="student_course" class="form-select form-select-sm" required>
                                    <option value="Computer Science" <?php if($branch == 'Computer Science') echo 'selected'; ?>>CS</option>
                                    <option value="Data Science" <?php if($branch == 'Data Science') echo 'selected'; ?>>Data Science</option>
                                    <option value="Information Technology" <?php if($branch == 'Information Technology') echo 'selected'; ?>>IT</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold d-block mb-1">Gender</label>
                            <input type="radio" name="student_gender" value="Male" <?php if($gender != 'Female') echo 'checked'; ?> required> Male
                            <input type="radio" name="student_gender" value="Female" class="ms-2" <?php if($gender == 'Female') echo 'checked'; ?>> Female
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold mb-1">Address</label>
                            <textarea name="student_address" class="form-control form-control-sm" rows="2" required><?php echo $address; ?></textarea>
                        </div>
                        <button type="submit" class="btn <?php echo $is_edit ? 'btn-warning text-dark fw-bold' : 'btn-primary gradient-header border-0'; ?> w-100 btn-sm shadow-sm">
                            <i class="fa-solid fa-floppy-disk me-1"></i><?php echo $is_edit ? 'Update Record' : 'Save Record'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form method="GET" action="index.php" class="input-group input-group-sm mb-3 shadow-sm rounded">
                <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search by Name, Email, or Branch..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-dark px-3">Filter</button>
                <?php if(!empty($search)): ?><a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i></a><?php endif; ?>
            </form>

            <div class="card shadow-sm border-0 rounded overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0 table-sm" style="font-size: 0.9rem;">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Details</th>
                                <th>Branch</th>
                                <th class="text-center">CGPA</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $rowClass = ((float)$row['cgpa'] > 8.0) ? 'table-success' : '';
                                    echo "<tr class='$rowClass'>";
                                    echo "<td class='fw-bold text-center text-muted'>#" . $row['id'] . "</td>";
                                    echo "<td>
                                            <div class='fw-bold text-dark'>" . htmlspecialchars($row['name']) . "</div>
                                            <div class='text-muted small'>" . htmlspecialchars($row['email']) . " | " . htmlspecialchars($row['phone']) . "</div>
                                          </td>";
                                    echo "<td><span class='badge bg-secondary'>" . htmlspecialchars($row['branch']) . "</span></td>";
                                    echo "<td class='text-center fw-bold'>" . htmlspecialchars($row['cgpa']) . "</td>";
                                    echo "<td class='text-center'>
                                            <div class='btn-group btn-group-sm'>
                                                <a href='index.php?edit_id=" . $row['id'] . "' class='btn btn-warning py-0 px-2' title='Edit'><i class='fa-solid fa-pencil'></i></a>
                                                <a href='index.php?delete_id=" . $row['id'] . "' class='btn btn-danger py-0 px-2' title='Delete' onclick='return confirm(\"Bhai, pakka delete karna hai?\")'><i class='fa-solid fa-trash-can'></i></a>
                                            </div>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center py-4 text-muted'>No student records located.</td></tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light border-0 py-2 text-end">
                    <span class="badge bg-primary px-3 py-1.5 rounded-pill shadow-sm">Total Students: <?php echo mysqli_num_rows($result); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>