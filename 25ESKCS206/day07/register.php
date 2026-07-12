<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-card {
            max-width: 500px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        .form-control, .form-select {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
        }
        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: #38bdf8;
            color: #f8fafc;
            box-shadow: 0 0 0 0.25px #38bdf8;
        }
    </style>
</head>
<body>

    <div class="form-card p-4 m-3">
        <h2 class="text-info mb-4 text-center fw-bold">Student Registration</h2>
        <form action="process.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label text-muted small text-uppercase fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label text-muted small text-uppercase fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="branch" class="form-label text-muted small text-uppercase fw-bold">Branch</label>
                <select class="form-select" id="branch" name="branch" required>
                    <option value="" selected disabled>Select your branch</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Economics">Economics</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label text-muted small text-uppercase fw-bold">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <button type="submit" class="btn btn-info w-100 fw-bold text-dark">Submit Registration</button>
        </form>
    </div>

</body>
</html>