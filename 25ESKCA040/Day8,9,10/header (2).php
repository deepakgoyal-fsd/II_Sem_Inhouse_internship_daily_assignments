<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
 <header  class="bg-light text-white border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
             <img src="https://t4.ftcdn.net/jpg/00/86/51/89/360_F_86518909_nNEfIYynMf0MCkf1BPRbOlt9QCaI4BNi.jpg" alt="logo" width="100" height="60">
             
             <nav>
                <ul class="nav"> 
                    <li class="nav-item"><a href="registration.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul> 
</nav>
<button type="button" class="btn btn-primary"><a href="login.php" class="text-white text-decoration-none">Login</a></button>
        </div>
    </div>     
    <form action="" method="post" class="container mt-5 justify-content-between align-items-center" style="max-width: 400px;">
        <h3 class="mb-3 text-dark">Registration Form</h3>
        <input type="text" name="username" placeholder="Username" class="form-control mb-3" value="" required> 
        <input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
        <input type="submit" name="submit" value="Register" class="btn btn-primary ">
        <a href="login.php" class="btn btn-link">Already have an account? Login</a>
    </form>   
   
            
</body>
</html>