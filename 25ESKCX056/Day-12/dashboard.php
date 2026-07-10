<?php 

include ('dashboardHeader.php');
include ('db_connect.php');

$user_id = intval($_SESSION['user_id']);
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $user_id");
$user = mysqli_fetch_assoc($result);

?>

<?php include ('dashboardVertical.php'); ?>

 <div class ="container-fluid">
    <div class = "row">

            <div class = "col-md-9">
                <h2><?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?></h2>

                <table class="table table-bordered mt-4" style="max-width:500px;">
                    <tr>
                        <th>Profile Picture</th>
                        <td>
                            <?php if (!empty($user['myFile'])): ?>
                                <img src="<?php echo $user['myFile']; ?>" style="width:80px;height:80px;object-fit:cover;border-radius:50%;">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr><th>Name</th><td><?php echo $user['username']; ?></td></tr>
                    <tr><th>Email</th><td><?php echo $user['email']; ?></td></tr>
                </table>
            </div>
        </div>
    
    </div>
  

<?php include('footer.php'); ?>