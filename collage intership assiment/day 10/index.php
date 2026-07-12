<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resister form</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      
</head>
<body>
    <form>
        <div class="container mt-5 col-md-6">
        <h1>Registration Form</h1>
        <form action="process.php" method="POST">">
        <div class="mb-3" >
            <h4><label for="name">Name:</label><br></h4>
            <input type="text" name="name" id="name" name="name" placeholder="Enter your name"><br>
        </div>
        <div class="mb-3">
            <h4><label for="id">ID:</label><br></h4>
            <input type="text" name="id" id="id" name="id" placeholder="Enter your ID"><br>
        </div>
        <div class="mb-3">
            <h4><label for="college">College:</label><br></h4>
            <input type="text" name="college" id="college" name="college" placeholder="Enter your college"><br>
        </div>
        <div class="mb-3">
            <h4><label for="branch">Branch:</label><br></h4>
            <input type="text" name="branch" id="branch" name="branch" placeholder="Enter your branch"><br>
        </div>
        <div class="mb-3">
           <h4> <label for="password">Password:</label><br></h4>
            <input type="password" name="password" id="password" name="password" placeholder="Enter your password"><br>
        </div>
        <div>
            <input type="submit" class="form-control btn-primry" value="Submit" style=" background-color: blue;">
        </div>
    </form>
</div>
    </form>
</body>
</html>