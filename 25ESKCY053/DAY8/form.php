<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Student Registration Form</h2>

    <form action="process.php" method="POST">

        <label>First Name</label>
        <input type="text" name="fname" required>

        <label>Last Name</label>
        <input type="text" name="lname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone Number</label>
        <input type="tel" name="phone" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Date of Birth</label>
        <input type="date" name="dob">

        <label>Gender</label><br>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
        <br><br>

        <label>Course</label>
        <select name="course">
            <option value="">Select Course</option>
            <option>B.Tech</option>
            <option>BCA</option>
            <option>BBA</option>
            <option>B.Sc</option>
        </select>

        <label>Address</label>
        <textarea name="address" rows="4"></textarea>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <label>Profile Image</label>
<input type="file" name="image" accept="image/*">

        <label>
            <input type="checkbox" name="terms" required>
            I agree to Terms & Conditions
        </label>

        <br><br>

        <input type="reset" value="Clear" class="btn">
        <input type="submit" value="Register" class="btn">

    </form>

</div>

</body>
</html>
