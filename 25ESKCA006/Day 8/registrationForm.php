<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Registration</title>
    <link rel="stylesheet" href="css/formStylesheet.css">
    <!-- <style>
        h1{
            color: aqua !important;
        }
        </style> -->
</head>
<body>
    <div class="form-container">
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <centre><h1 style="color: rgb(25, 25, 211);">Registration Form</h1></centre>
        <p>Submit this form for online registration.</p>
        <br>
        <label>
            Name:
            <input type="text" name="name" id="txtName" required placeholder="Enter your Name" pattern="^[a-zA-Z\s]+$" title="Please enter a valid name" />
        </label>
        <label for="txtBranch">Branch:</label>
        <select name="branch" id="txtBranch" required>
            <option value="">Select your Branch</option>
            <option value="CSE(AI)">CSE(AI)</option>
            <option value="CSE(DS)">CSE(DS)</option>
            <option value="CSE(Cyber Security)">CSE(Cyber Security)</option>
            <option value="CSE(Cloud Computing)">CSE(Cloud Computing)</option>
            <option value="CSE(Software Engineering)">CSE(Software Engineering)</option>
            <option value="CSE(Information Technology)">CSE(Information Technology)</option>
        </select>
        <label>
            Profile Picture:
            <input type="file" name="ProfilePicture" accept="image/*" id="fileProfilePicture" required />
        </label>
        <br><br>
        <label>
            Email Address:
            <input type="email" name="email" id="txtEmail" required placeholder="Enter your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" />
            </label>
            <label>
                CGPA:
                <input type="number" name="cgpa" id="txtCGPA" required placeholder="Enter your CGPA" min="0" max="10" step="0.01" />
            </label>
            <br><br>
            <div class="colm">
            <label> Skills:</label>
            <lebel for="id1">HTML</lebel>
                <input type="checkbox" value="id1" id="id1" name="id1" required> 
            <lebel for="id2">CSS</lebel>
                <input type="checkbox" value="id2" id="id2" name="id2" required>
            <lebel for="id3">JavaScript</lebel>
                <input type="checkbox" value="id3" id="id3" name="id3" required>
            <lebel for="id4">PHP</lebel>
                <input type="checkbox" value="id4" id="id4" name="id4" required>
            <lebel for="id5">Python</lebel>
                <input type="checkbox" value="id5" id="id5" name="id5" required>
            <lebel for="id6">Java</lebel>
                <input type="checkbox" value="id6" id="id6" name="  id6" required>  
                <lebel for="id7">C++</lebel>    
                <input type="checkbox" value="id7" id="id7" name="id7" required>
                </div>
        

        <!-- <label>
            Phone No.:
            <input type="tel" name="phoneNumber" id="txtPhone" required placeholder="Enter your Phone No" />
        </label> -->
       <div class="colm">
        <label>
            Phone Number :
            <input type="tel" name="phoneNumber" id="txtPhoneNumber" required placeholder="Enter your Phone No" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" />        
            </label>
            <label>
            Date of Birth:
            <input type="date" name="DOB" id="dtDOB"  required placeholder="Enter your Date of Birth" />
        </label> 
        </div>
        <label>
            Gender:
        </label>
            <br><br>
            <input type="radio" id="check-male" name="gender" checked />
            <label for="check-male">Male</label>

            <input type="radio" id="check-female" name="gender" />
            <label for="check-female">Female</label>

            <input type="radio" id="check-Transgender" name="gender" />
            <label for="check-Transgender">Transgender</label>

            <input type="radio" id="check-other" name="gender" />
            <label for="check-other">Prefer not to say</label>
            <br><br>
            
            <div class="address-container">
            <label for="txtAddress">Address:</label>
          
            <input type="text" name="address" id="txtAddress" required placeholder="Enter Street Address" />

            <input type="text" name="address2" id="txtAddress2" required placeholder="Enter Street Address Line 2" />
            
            <!-- <input type="country" id="txtCountry" required placeholder="Enter your Country" /> -->
            <label for="txtCountry">Country:</label>
            <select name="country" id="txtCountry" required>
                <option value="">Select your Country</option>
                <option value="India">India</option>
                <option value="USA">United States</option>
                <option value="UK">United Kingdom</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="Argentina">Argentina</option>
                <option value="Brazil">Brazil</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Mexico">Mexico</option>
                <option value="Nepal">Nepal</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Russia">Russia</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Singapore">Singapore</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Thailand">Thailand</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
</select>
            <!-- <input type="city" id="txtCity" required placeholder="Enter your City" /> -->
             <label for="txtState">State:</label>
             <select name="state" id="txtState">
                <option value="">Select your State</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Delhi">Delhi</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Karnataka">Karnataka</
                <option value="Maharashtra">Maharashtra</option>
            </select>
             <label for="txtCity">City:</label>
             <select name="city" id="txtCity">
                <option value="">Select your City</option>
                <option value="Kota">Kota</option>
                <option value="Jaipur">Jaipur</option>
                <option value="Delhi">Delhi</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Chennai">Chennai</option>
                <option value="Hyderabad">Hyderabad</option>
                </select>

            
            <div class="row">
            <input type="text" id="txtRegion" required placeholder="Enter your Region" />
            <input type="text" id="txtPostalCode" required placeholder="Enter your Postal Code" />
            </div>
            </div>
            <label for="pwdPassword">Password:</label>
            <input type="password" id="pwdPassword" name="pwdPassword" />

            <label for="pwdConfirmPassword">Confirm Password:</label>
            <input type="password" id="pwdConfirmPassword" name="pwdConfirmPassword">
            
            <input type="submit" value="Submit" id="Submit">
    </form>
    </div>
</body>
</html>

    