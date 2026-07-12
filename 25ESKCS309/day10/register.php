<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['success']);


/**
 * If page is opened directly (GET request),
 * clear old form values
 */
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     unset($_SESSION['old']);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Scrum Digital | Web Development Bootcamp</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand text-white fw-bold" href="#page-top">Scrum Digital</a><button
                class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">Menu
                <i class="fas fa-bars ms-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#highlights">Highlights</a></li>
                    <li class="nav-item"><a class="nav-link" href="#curriculum">Curriculum</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Why Join</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php include "partial/header.php" ?>

    <section>
        <div class="container mt-5 col-md-6">
            <h1>Registration Form</h1>

            <!-- ERROR ALERT -->
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <!-- SUCCESS ALERT -->
            <?php if ($success) { ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
            <?php } ?>

            <form action="process.php" method="POST">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"
                        value="<?= $_SESSION['old']['name'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"
                        value="<?= $_SESSION['old']['email'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>College</label>
                    <input type="text" class="form-control" name="college"
                        value="<?= $_SESSION['old']['college'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>Branch</label>
                    <input type="text" class="form-control" name="branch"
                        value="<?= $_SESSION['old']['branch'] ?? '' ?>">
                    <input type="hidden" name="id_hidden" value="1">
                </div>

                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <?php include "partial/footer.php" ?>
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">Copyright © Scrum Digital 2026 | 15 Days Web Development Bootcamp
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>