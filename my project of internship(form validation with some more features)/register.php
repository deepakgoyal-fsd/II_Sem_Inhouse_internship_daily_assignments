<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- CSS -->
    <link rel="stylesheet" href="register.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
</head>
<body>

<div class="container">

    <div class="form-box">

        <h2>Create Account</h2>
        <p>Register to continue</p>

        <form action="process_register.php" method="POST" enctype="multipart/form-data">

            <!-- Full Name -->
<div class="input-group">
    <label for="full_name">Full Name</label>
    <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
</div>

<!-- Email -->
<div class="input-group">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
</div>

<!-- Mobile -->
<div class="input-group">
    <label for="mobile">Mobile Number</label>
    <input type="tel" id="mobile" name="mobile" placeholder="Enter 10-digit mobile number" maxlength="10" required>
</div>

<!-- Gender -->
<div class="input-group">
    <label>Gender</label>

    <div class="radio-group">
        <label>
            <input type="radio" name="gender" value="Male" required>
            Male
        </label>

        <label>
            <input type="radio" name="gender" value="Female">
            Female
        </label>

        <label>
            <input type="radio" name="gender" value="Other">
            Other
        </label>
    </div>
</div>

<!-- Date of Birth -->
<div class="input-group">
    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" required>
</div>

<!-- Age -->
<div class="input-group">
    <label for="age">Age</label>
    <input type="number" id="age" name="age" readonly placeholder="Auto Calculated">
</div>

<!-- Branch -->
<div class="input-group">
    <label for="branch">Branch</label>

    <select id="branch" name="branch" required>

        <option value="">Select Branch</option>

        <option value="Computer Science">Computer Science</option>

        <option value="Information Technology">Information Technology</option>

        <option value="Artificial Intelligence">Artificial Intelligence</option>

        <option value="Electronics">Electronics</option>

        <option value="Electrical">Electrical</option>

        <option value="Mechanical">Mechanical</option>

        <option value="Civil">Civil</option>

    </select>
</div>

<!-- Profile Photo -->
<div class="input-group">
    <label for="photo">Profile Photo</label>
    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" required>
</div>

<!-- Password -->
<div class="input-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Create Password" required>
</div>

<!-- Confirm Password -->
<div class="input-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
</div>

<!-- Terms -->
<div class="checkbox-group">
    <label>
        <input type="checkbox" name="terms" required>
        I accept the Terms & Conditions
    </label>
</div>

<!-- Register Button -->
<button type="submit" name="submit" class="btn">
    Register
</button>

<p class="login-link">
    Already have an account?
    <a href="login.php">Login</a>
</p>

        </form>

    </div>

</div>
<script src="validation.js"></script>


</body>

</html>