<?php
$pageTitle = "Student Registration";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $pageTitle ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">

                        <h2>
                            <?= $pageTitle ?>
                        </h2>

                    </div>

                    <div class="card-body">

                        <form action="process.php" method="POST">

                            <div class="mb-3">

                                <label class="form-label">Full Name</label>

                                <input type="text" name="name" class="form-control" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Email</label>

                                <input type="email" name="email" class="form-control" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Branch</label>

                                <input type="text" name="branch" class="form-control" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Phone</label>

                                <input type="text" name="phone" class="form-control" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Gender</label><br>

                                <input type="radio" name="gender" value="Male"> Male

                                <input type="radio" name="gender" value="Female" class="ms-3"> Female

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Course</label>

                                <select name="course" class="form-select">

                                    <option>B.Tech</option>

                                    <option>BCA</option>

                                    <option>B.Sc</option>

                                    <option>MCA</option>

                                </select>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Address</label>

                                <textarea name="address" class="form-control" rows="4"></textarea>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">Profile Photo</label>

                                <input type="file" class="form-control">

                                <small class="text-muted">

                                    UI only (Day 7 Assignment)

                                </small>

                            </div>

                            <button type="submit" class="btn btn-primary w-100">

                                Register

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>