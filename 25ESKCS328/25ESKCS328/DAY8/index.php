 <!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Student Registration</h2>

<form action="validation.php" method="POST">
    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

    <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>

    <input type="number" name="marks" class="form-control mb-3" placeholder="Marks" required>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
