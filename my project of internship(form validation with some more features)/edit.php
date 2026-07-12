<?php

include("db_connect.php");

// ID lena
$id = $_GET['id'];

// Student Data Fetch
$sql = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

// Update
if(isset($_POST['update']))
{
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $branch = $_POST['branch'];

    $update = "UPDATE user
               SET
               full_name='$full_name',
               email='$email',
               mobile='$mobile',
               gender='$gender',
               dob='$dob',
               age='$age',
               branch='$branch'
               WHERE id=$id";

    if(mysqli_query($conn,$update))
    {
        echo "<script>
        alert('Student Updated Successfully!');
        window.location='user.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit user</title>


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background-image: url("background.jpg");
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px;
}

.form-box{
    width:700px;
    background: #2d7062c0;;
    border-radius:20px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,.2);
}

.form-box h2{
    text-align:center;
    color:lightskyblue;
    margin-bottom:30px;
    font-size:32px;
}

.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:8px;
    font-size:16px;
    font-weight:600;
    color:lightskyblue;
}

.input-group input,
.input-group select{
    width:100%;
    padding:13px 15px;
    border:1px solid #dcdcdc;
    border-radius:10px;
    font-size:16px;
    transition:.3s;
    outline:none;
}

.input-group input:focus,
.input-group select:focus{
    border-color:#2563eb;
    box-shadow:0 0 8px rgba(37,99,235,.25);
}

.row{
    display:flex;
    gap:20px;
}

.row .input-group{
    flex:1;
}

.radio-group{
    display:flex;
    gap:30px;
    margin-top:10px;
}

.radio-group label{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:16px;
    cursor:pointer;
}

.radio-group input{
    width:18px;
    height:18px;
}

.btn{
    width:100%;
    padding:14px;
    margin-top:15px;
    background:#172442;
    color:#fff;
    border:none;
    border-radius:10px;
    font-size:18px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#444;
}

.back{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    color:#2563eb;
    font-weight:600;
    transition:.3s;
}

.back:hover{
    color:#1d4ed8;
}

img{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:0 auto 20px;
    border:4px solid #172442;
}

input[type="file"]{
    border:none;
    padding:5px;
}

input[readonly]{
    background:#f3f4f6;
    cursor:not-allowed;
}

::placeholder{
    color:#999;
}

@media(max-width:768px){

    .form-box{
        width:100%;
        padding:25px;
    }

    .row{
        flex-direction:column;
        gap:0;
    }

    .radio-group{
        flex-direction:column;
        gap:12px;
    }

    .form-box h1{
        font-size:28px;
    }

}

</style>

</head>

<body>

<div class="content">

<div class="form-box">

<h2>Edit User</h2>
<br><br>

<form method="POST">
<!-- <label>Name</label>
<br>
<input
type="text"
name="full_name"
value="<?php echo $row['full_name']; ?>">
<br><br> -->
<div class="input-group">
    <label>Name</label>

    <input
        type="text"
        name="full_name"
        value="<?php echo $row['full_name']; ?>">
</div>
<br><br>

<!-- <label>E-mail</label>
<br>
<input
type="email"
name="email"
value="<?php echo $row['email']; ?>">
<br><br> -->
<div class="input-group">
    <label>Email</label>

    <input
        type="email"
        name="email"
        value="<?php echo $row['email']; ?>">
</div>
<br><br>

<!-- <lable>Mobile</lable>
<br>
<input
type="num"
name="mobile"
value="<?php echo $row['mobile']; ?>">
<br><br> -->
<div class="input-group">
    <label>Mobile</label>

    <input
        type="text"
        name="mobile"
        value="<?php echo $row['mobile']; ?>">
</div>
<br><br>


<div class="input-group">
    <label>Gender</label>
    <br>

    <div class="radio-group">
        <label>
            <input type="radio" name="gender" value="Male" required
            value="<?php echo $row['gender']; ?>">
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
<br><br>

<div class="input-group">
    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob"  value="<?php echo $row['dob']; ?>" required>
</div>
<br><br>

<div class="input-group">
    <label for="age">Age</label>
    <input type="number" id="age" name="age" readonly placeholder="Auto Calculated" value="<?php echo $row['age']; ?>">
</div>
<br><br>

<!-- <lable>Branch</lable>
<input
type="text"
name="branch"
value="<?php echo $row['branch']; ?>">
<br><br> -->
<div class="input-group">
    <label>Branch</label>

    <input
        type="text"
        name="branch"
        value="<?php echo $row['branch']; ?>">
</div>
<br><br>

<button type="submit" name="update" class="btn"> Update Student </button>

</form>

<br>
<button class="btn" type="button" onclick="window.location.href='user2.php'">Go back</button>

</div>

</div>
<script src="validation.js"></script>

</body>
</html>