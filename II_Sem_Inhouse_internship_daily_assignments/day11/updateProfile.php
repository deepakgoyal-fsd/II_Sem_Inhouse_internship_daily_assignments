<?php include('dashboardHeader.php'); 
    include ('checkProfile.php');

?>



<div class = "container mt-5" style ="max-width:400px;">
<form action = "" method = "post">
<h3 class = "mb-3">Update Profile</h3>
<p>Current Name: <?php echo $_SESSION['user_name']; ?></p>
<p>Current Email: <?php echo $_SESSION['user_email']; ?></p>
<input type = "text" name = "name" class = "form-control mb-3" placeholder = "New Name">
<input type = "email" name = "email" class = "form-control mb-3" placeholder = "New Email">
<label for="fileChoice">Choose a file To Update PFP:</label>
    <input class="form-control" type="file" name="myFile" id="fileChoice">
    <button  class = "btn btn-secondary" type="submit" name="submit">Upload File</button><br>
<button type = "submit" class = "btn btn-primary">Update Profile</button>
</form>
</div>



<?php include('footer.php'); ?>