<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body
    class="bodycolor">
    <h1 style="color:midnightblue" !important>Registration form</h1>
    <div id="divform">
    <form action="registration.php" method="post" class="form">

        <p><label>Full Name:</p>
        <p><input type="text" id="txtName" placeholder="Enter your name" class="rounded" name="fullname" />
        </label></p>

        <p><label>Email Address:</p>
        <input type="email" id="txtEmail" required placeholder="Enter your email" class="rounded" name="email" />
        </label>

        <p><label>Phone Number:</p>
        <input type="text" id="txtPhone" required placeholder="Enter your phone" class="rounded" name="phoneNumber" />
        </label>
        <p><label for="dtDOB>DOB">Birth Date:</p></label>
        <input type="date" id="dtDOB" name="dtDOB" class="rounded" name="dtDOB"/>

        
        <legend><p>Gender:</p></legend>

        <fieldset>
        <p><label>
        <input type="radio" id="check-male"  name="gender" checked/>
        <label for="chkMale">Male</label>

        <input type="radio" id="check-female"  name="gender" checked/>
        <label for="check-female">Female</label>

        
        <input type="radio" id="check-other"  name="gender" checked/>
        <label for="check-other">Prefer not to say</label></p>

        </fieldset>

        <legend><p>Department:</p></legend>
        <select>
            <option hidden>Choose department</option>
            <option>CS</option>
            <option>ME</option>
            <option>CE</option>
            <option>EE</option>
        </select>

        <p><label>Address:</p>
        <input type="text" id="txtAddress" required placeholder="Enter Street Address" class="rounded" name="address"/>
        </label>
        <p><select>
            <option hidden>Choose your Country</option>
            <option>India</option>
            <option>Japan</option>
            <option>China</option>
            <option>UK</option>
        </select>
        <input type="text" id="txtAddress2" required placeholder="Enter your City" class="rounded" name="address1"/></p>
        <p></label>
        <input type="text" id="txtAddress2" required placeholder="Enter Street Region" class="rounded" name="address2"/>
        </label>
        <input type="text" id="txtAddress2" required placeholder="Enter Pin-code" class="rounded" name="address3" />
        </label></p>

        <p><label for="pwdPassword">Password</label></p>
        <input type="password" id="pwdPassword" name="pwdPassword" class="rounded" name="password"/>

        <p><label for="pwdConfirmPassword">Confirm Password</label></p>
        <input type="password" id="pwdConfirmPassword" name="pwdConfirmPassword" class="rounded" name="confirmpassword"/>
        <input type="file" name="myfile" accept="image/*" required>
        <p><button type="submit">Submit</button></p>
        </div>
    </form>
</body>
</html>
