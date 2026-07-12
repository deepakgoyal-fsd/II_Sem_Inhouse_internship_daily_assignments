<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="container">
        <h2>Registration Form</h2>

        <form action="registration.php" method="post" enctype="multipart/form-data" class="form">
            <label>Upload Photo</label>
            <input type="file" name="myfile" required>

            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter full name" required>

            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter email address" required>

            <div class="row">
                <div class="column">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="Enter phone number" required>
                </div>

                <div class="column">
                    <label>Birth Date</label>
                    <input type="date" name="dob" required>
                </div>
            </div>

            <label>Gender</label>
            <div class="gender">
                <input type="radio" name="gender" required> Male
                <input type="radio" name="gender"> Female
                <input type="radio" name="gender"> Prefer not to say
            </div>

            <label>Address</label>
            <input type="text" name="address1" placeholder="Enter street address" required>
            <input type="text" name="address2" placeholder="Enter street address line 2">

            <div class="row">
                <div class="column">
                    <label>Country</label>
                    <select required>
                        <option>Country</option>
                        <option>India</option>
                        <option>USA</option>
                        <option>UK</option>
                    </select>
                </div>

                <div class="column">
                    <label>City</label>
                    <input type="text" name="city" placeholder="Enter your city" required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label>Region</label>
                    <input type="text" name="region" placeholder="Enter your region" required>
                </div>

                <div class="column">
                    <label>Postal Code</label>
                    <input type="text" name="postal" placeholder="Enter postal code" required>
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>

</body>

</html>