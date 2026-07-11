<?php
include "header.php";
?>
<?php
session_start();
require "database.php";

if (!isset($_SESSION["student_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_SESSION["student_id"];

    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $tenth = $_POST["tenth"];
    $twelfth = $_POST["twelfth"];
    $college = $_POST["college"];
    $course = $_POST["course"];
    $branch = $_POST["branch"];
    $year = $_POST["year"];
    $cgpa = $_POST["cgpa"];

    $hobbies = "";
    if(isset($_POST["hobbies"])){
        $hobbies = implode(",", $_POST["hobbies"]);
    }

    $address = $_POST["address"];
    $married = $_POST["married"];

    $sql = "INSERT INTO student_details
    (student_id,gender,age,tenth,twelfth,college,course,branch,year,cgpa,hobbies,address,married)

    VALUES

    ('$student_id','$gender','$age','$tenth','$twelfth','$college','$course','$branch','$year','$cgpa','$hobbies','$address','$married')";

    if(mysqli_query($conn,$sql)){
        header("Location: see_details.php");
        exit();
    }else{
        die(mysqli_error($conn));
    }
}
?>

<div style="max-width:900px;margin:40px auto;background:#ffffff;padding:35px;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.15);font-family:Arial,sans-serif;">

<h2 style="text-align:center;color:#2563eb;margin-bottom:30px;">
    Add Student Details
</h2>

<form action="add_details.php" method="POST">

    <h3 style="color:#333;">Personal Details</h3>
    <hr>

<label style="font-weight:bold;display:block;margin-bottom:10px;">Gender</label>

<div style="display:flex;align-items:center;gap:25px;margin-bottom:20px;">

    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
        <input type="radio" name="gender" value="Male" style="margin:0;">
        Male
    </label>

    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
        <input type="radio" name="gender" value="Female" style="margin:0;">
        Female
    </label>

    <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
        <input type="radio" name="gender" value="Other" style="margin:0;">
        Other
    </label>

</div>

    <br><br>

    <label style="font-weight:bold;">Age</label>

    <input
    type="number"
    name="age"
    placeholder="Enter Age"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <h3 style="color:#333;">Education Details</h3>
    <hr>

    <label style="font-weight:bold;">10th Percentage</label>

    <input
    type="number"
    step="0.01"
    name="tenth"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;">12th Percentage</label>

    <input
    type="number"
    step="0.01"
    name="twelfth"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;">College Name</label>

    <input
    type="text"
    name="college"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;">Course</label>

    <input
    type="text"
    name="course"
    placeholder="B.Tech, BCA, etc."

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;">Branch</label>

    <input
    type="text"
    name="branch"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;">Current Year</label>

    <select
    name="year"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

        <option>Select Year</option>
        <option>1st Year</option>
        <option>2nd Year</option>
        <option>3rd Year</option>
        <option>4th Year</option>

    </select>

    <br><br>

    <label style="font-weight:bold;">Current CGPA</label>

    <input
    type="number"
    step="0.01"
    name="cgpa"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;">

    <br><br>

    <label style="font-weight:bold;display:block;margin-bottom:10px;">Hobbies</label>

<div style="display:flex;flex-wrap:wrap;gap:20px;">

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="checkbox" name="hobbies[]" value="Cricket" style="margin:0;">
        Cricket
    </label>

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="checkbox" name="hobbies[]" value="Football" style="margin:0;">
        Football
    </label>

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="checkbox" name="hobbies[]" value="Coding" style="margin:0;">
        Coding
    </label>

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="checkbox" name="hobbies[]" value="Music" style="margin:0;">
        Music
    </label>

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="checkbox" name="hobbies[]" value="Reading" style="margin:0;">
        Reading
    </label>

</div>

    <br><br>

    <label style="font-weight:bold;">Address</label>

    <textarea
    name="address"
    rows="4"

    style="width:100%;padding:12px;margin-top:8px;
    border:1px solid #ccc;border-radius:8px;"></textarea>

    <br><br>

   <label style="font-weight:bold;display:block;margin-bottom:10px;">Marital Status</label>

<div style="display:flex;gap:25px;">

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="radio" name="married" value="Married" style="margin:0;">
        Married
    </label>

    <label style="display:flex;align-items:center;gap:6px;">
        <input type="radio" name="married" value="Unmarried" style="margin:0;">
        Unmarried
    </label>

</div>
    <br><br>

    <button

    style="
    width:100%;
    background:#2563eb;
    color:white;
    border:none;
    padding:14px;
    font-size:18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;">

        Save Details

    </button>

</form>

</div>

<?php
include "footer.php";
?>