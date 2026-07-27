<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="cssfile.css">

</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action= "registrationn.php" method="post" class="form">

    <form>
        <label>Full Name</label>
        <input type="text" placeholder="Enter full name">

        <label>Email Address</label>
        <input type="email" placeholder="Enter email address">

        <div class="row">
            <div class="column">
                <label>Phone Number</label>
                <input type="tel" placeholder="Enter phone number">
            </div>

            <div class="column">
                <label>Birth Date</label>
                <input type="date">

            </div>
        </div>

        <label>Gender</label>
        <div class="gender">
            <input type="radio" name="gender"> Male
            <input type="radio" name="gender"> Female        
            <input type="radio" name="gender"> Prefer not to say

        </div>

        <label>Address</label>
        <input type="text" placeholder="Enter street address">
        <input type="text" placeholder="Enter street address line 2">

    
        <div class="row">
            <div class="column">
                <label>Country</label>
                <select>
                   
                    <option>India</option>
                    <option>USA</option>
                    <option>UK</option>
                     <option>Thailand</option>

                </select>
            </div>

            <div class="column">
                <label>City</label>
                <input type="text" placeholder="Enter your city">
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label>Region</label>
                <input type="text" placeholder="Enter your region">
            </div>

            <div class="column">
                <label>Postal Code</label>
                <input type="text" placeholder="Enter postal code">
            </div>
        </div>

        <div>
        <h6> Enter home code </h6>
            <input type ="text" name="home"
            placeholder="Enter home code"
            pattern="[0-9]{5,6}" title="Enter valid home code" required>

  </div>

        <button type="submit">Register</button>
    </form>
    <form action="upload.php" method="POST"
    enctype="multipart/form-data">
    <label> Select image :</label>
    <input type ="file" name="my_image">
    <button type ="submit">upload</button>

</form>

</div>
</body>

</html>