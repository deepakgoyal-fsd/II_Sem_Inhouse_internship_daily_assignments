<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta NAME="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- Header/Navbar -->
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3" href="#">Student Registration</a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="register.php">Home</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li> -->

            </ul>

            <a href="#" class="btn btn-primary ms-lg-3">
                Get Started
            </a>
        </div>

    </div>
</nav>

<section> <div class="container" >
<h1>Registration form</h1>
    
    <hr>
    <form class="needs-validation" novalidate action="process.php" method="POST" >
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">NAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" NAME="NAME" required>
      <div class="invalid-feedback">Please enter your NAME.</div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">COLLEGE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" NAME="COLLEGE" required>
      <div class="invalid-feedback">Please enter your college.</div>
    </div>
    
  </div>
  <div class="row mb-3">
    <label for="inputBranch" class="col-sm-2 col-form-label">BRANCH</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputBranch" NAME="BRANCH" required>
      <div class="invalid-feedback">Please enter your branch.</div>
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">GENDER</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" NAME="gridRadios" id="gridRadios1" value="MALE" checked required>
        <label class="form-check-label" for="gridRadios1">
          MALE
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" NAME="gridRadios" id="gridRadios2" value="FEMALE">
        <label class="form-check-label" for="gridRadios2">
          FEMALE
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" NAME="gridRadios" id="gridRadios3" value="OTHERS" >
        <label class="form-check-label" for="gridRadios3">
          OTHERS
        </label>
      </div>
    </div>
    <div class="col-12">
      <div class="invalid-feedback">Please select a gender.</div>
    </div>
  </fieldset>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">OPTING FOR BRANCH CHANGE
          
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<!-- <?php

// Arrays
$errors = [];
$data = [];

// Check if form is submitted
if (isset($_POST['submit'])) {

    // ---------------- NAME Validation ----------------
    if (empty($_POST[''])) {
        $errors['NAME'] = "NAME is required.";
    } else {
        $NAME = trim($_POST['NAME']);

        if (strlen($NAME) < 3) {
            $errors['NAME'] = "NAME must be at least 3 characters.";
        } else {
            $data['NAME'] = $NAME;
        }
    }

    // ---------------- Email Validation ----------------
    // if (empty($_POST['email'])) {
    //     $errors['email'] = "Email is required.";
    // } else {
    //     $email = trim($_POST['email']);

    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $errors['email'] = "Invalid email format.";
    //     } else {
    //         $data['email'] = $email;
    //     }
    // }

    // ---------------- Password Validation ----------------
    // if (empty($_POST['password'])) {
    //     $errors['password'] = "Password is required.";
    // } else {
    //     $password = $_POST['password'];

    //     if (strlen($password) < 8) {
    //         $errors['password'] = "Password must be at least 8 characters.";
    //     } else {
    //         $data['password'] = $password;
    //     }
    // }

    // ---------------- Final Check ----------------
    if (empty($errors)) {

        echo "<h2>Validation Successful</h2>";

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        // Database insertion code goes here

    } else {

        echo "<h2>Validation Failed</h2>";

        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
}

?> -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
</head>
<body>

<form method="POST">

    <label>NAME:</label><br>
    <input type="text" NAME="NAME"><br><br>

    <label>Email:</label><br>
    <input type="text" NAME="email"><br><br>

    <label>Password:</label><br>
    <input type="password" NAME="password"><br><br>

    <input type="submit" NAME="submit" value="Register">

</form>
 -->


    <!-- <form  action="process.php" method="POST" >
         

        
<label for="NAME">NAME</label><br>
    <input type="text" NAME="NAME" id="NAME"  placeholder="enter your NAME" ><br>


<label for="college">college</label><br>
    <input type="text" NAME="college" id="college" placeholder="enter your college" ><br>
     <label for="">branch</label><br>

    <input type="text" NAME="branch"  placeholder="enter your branch" ><br>
    <button type="submit">submit</button>
    <hr>

    
   

    








    </form> -->













  </div>

</section>




 <script>
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

<?php include "footer.php";
?>
 
<!-- Footer -->


    

</body>
</html>