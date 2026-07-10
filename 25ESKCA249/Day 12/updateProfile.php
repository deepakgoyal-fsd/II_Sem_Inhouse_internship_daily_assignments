<?php
session_start();
include("dashboardHeader.php");
include("db_connect.php");
include("checkUpdateProfileError.php");
?>

<main class="page-shell">


<?php include("dashboardVerticalContent.php"); ?>

<div class="container">
    <form action="updateProfile.php" method="post" class="form-card">
        <h3 class="mb-3">Update Profile</h3>
        <p class="text-secondary mb-4">Update your name and programming skills.</p>




        <?php if ($error != "") { ?>
            <div class="alert alert-danger py-2"><?=$error?></div>
        <?php } ?>

        <?php if ($success != "") { ?>
            <div class="alert alert-success py-2"><?=$success?></div>
        <?php } ?>




        
        <label class="form-label">Name</label>
        <input
            type="text"
            class="form-control mb-3"
            placeholder="Enter your name"
            name="name"
            value="<?=htmlspecialchars($name)?>"
        >

        <label class="form-label">Skills</label>

        <div class="row mb-4">
            <?php foreach ($skillOptions as $skill) { ?>
                <div class="col-md-4 col-sm-6 mb-2">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="skills[]"
                            value="<?=$skill?>"
                            id="skill_<?=$skill?>"
                            <?php if (in_array($skill, $selectedSkills)) { echo "checked"; } ?>
                        >
                        <label class="form-check-label" for="skill_<?=$skill?>">
                            <?=$skill?>
                        </label>
                    </div>
                </div>
            <?php } ?>
        </div>

        <button class="btn btn-primary w-100" type="submit">
            Update Profile
        </button>
    </form>
</div>

<?php include("dashboardFooter.php"); ?>
</main>

<?php
include("footer.php");
?>