<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

   <?php include "partial/header.php" ?>

    <section>
    <div class="container mt-5 col-md-6">
        <h1>Registration Form</h1>
        <form action="process.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="college" class="form-label">College:</label>
                <input type="text" class="form-control" id="college" name="college" placeholder="Enter your college">
            </div>
            <div class="mb-3">
                <label for="branch" class="form-label">Branch:</label>
                <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter your branch">
                <input type="hidden" name="id_hidden" value="1">
            </div>
            <div class="mb-3  ">                
                <input type="submit" class="form-control btn-primary" name="submit"  value="submit">
            </div>
        </form>
    </div>
    </section>

    <?php include "partial/footer.php" ?>
</body>
</html>