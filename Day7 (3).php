<?php include "db_connect.php" ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <?php include "partial/header.php" ?>
    <section>
        <div class="container mt-5 col-md-6">

            <h1>Registration Successful!</h1>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


            <div class="alert alert-success" role="alert">
                You have filled below details
            </div>

            <?php
            $errors = [];

            if (isset($_POST['name']) && empty(trim($_POST['name']))) {
                $errors['name'] = "Name is required";
            }
            if (isset($_POST['college']) && empty(trim($_POST['college']))) {
                $errors['college'] = "College is required";
            }
            if (isset($_POST['branch']) && empty(trim($_POST['branch']))) {
                $errors['branch'] = "Branch is required";
            }

            // if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // $errors[] = "Invalid email address.";
            // }



            if (count($errors) == 0) {

                echo "Name " . $_POST['name'];
                echo "<br>";
                echo "College: " . $_POST['college'];
                echo "<br>";
                echo "Branch: " . $_POST['branch'];
                echo "<br>";
                // echo "Hidden Value: " . $_POST['id_hidden'];

                // echo "Remarks: " . CGPAText($_POST['cgpa']);
                $name = $_POST['name'];
                $college = $_POST['college'];
                $branch = $_POST['branch'];

                 $sql = "INSERT INTO students (name, college, branch) 
                VALUES ('" . $name . "', 
                '" . $college . "',
                 '" . $branch . "')";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                header("Location: register1.php");
            }
            ?>
        </div>
    </section>
    <?php include "partial/footer.php" ?>

</body>

</html>