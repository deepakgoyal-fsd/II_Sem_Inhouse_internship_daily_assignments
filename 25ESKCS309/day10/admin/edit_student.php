<?php
include "../common/db_connect.php";

$id = $_GET['id'] ?? null;
if (!$id) { header("Location: students.php"); exit; }

$stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$student) { header("Location: students.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Edit Student</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i><span>Students</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registration</h6>
                        <a class="collapse-item" href="students.php">View Students</a>
                        <a class="collapse-item" href="add_student.php">Add Student</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Addons</div>
            <li class="nav-item"><a class="nav-link" href="contacts.php"><i class="fas fa-fw fa-table"></i><span>Contacts</span></a></li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle"></button></div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Student</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="p-5">
                                                <h2 class="h4 text-gray-900 mb-4">Update Student Details</h2>
                                                <form class="user" action="edit_student_process.php" method="POST">
                                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" name="name" value="<?= htmlspecialchars($student['name']) ?>" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-user" name="email" value="<?= htmlspecialchars($student['email']) ?>" placeholder="Email Address">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" name="college" value="<?= htmlspecialchars($student['college']) ?>" placeholder="College">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" name="branch" value="<?= htmlspecialchars($student['branch']) ?>" placeholder="Branch">
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-user btn-block" onclick="return confirm('Are you sure you want to update this student details?')">Update Student</button>
                                                    <a href="students.php" class="btn btn-secondary btn-user btn-block">Cancel</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto"><div class="copyright text-center my-auto"><span>Copyright &copy; Your Website 2020</span></div></div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
