<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: blue!important;" class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
        <h2 class="mb-4">Student Registration</h2>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male" class="form-check-input"> Male
                <input type="radio" name="gender" value="Female" class="form-check-input ms-2"> Female
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <select name="course" class="form-select">
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Photo</label>
                <input type="file" name="profile_pic" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>