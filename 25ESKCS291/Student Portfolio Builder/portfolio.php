<?php
session_start();
include("db_connect.php");
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
if(isset($_POST['save_portfolio']))
{
    $user_id = $_SESSION['user_id'];
    $about = $_POST['about'];
    $education = $_POST['education'];
    $current_sem = $_POST['current_sem'];
    $cgpa = $_POST['cgpa'];
    $skills = $_POST['skills'];
    $projects = $_POST['projects'];
    $certifications = $_POST['certifications'];
    $internships = $_POST['internships'];
    $achievements = $_POST['achievements'];
    $languages = $_POST['languages'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $contact_email = $_POST['contact_email'];
    $check = "SELECT * FROM portfolio WHERE user_id='$user_id'";
    $check_result = mysqli_query($conn, $check);
    if(mysqli_num_rows($check_result) > 0)
    {
        $sql = "UPDATE portfolio SET
                about='$about',
                education='$education',
                current_sem='$current_sem',
                cgpa='$cgpa',
                skills='$skills',
                projects='$projects',
                certifications='$certifications',
                internships='$internships',
                achievements='$achievements',
                languages='$languages',
                github='$github',
                linkedin='$linkedin',
                contact_email='$contact_email',
                updated_at=NOW()
                WHERE user_id='$user_id'";
    }
    else
    {
        $sql = "INSERT INTO portfolio
                (user_id, about, education, current_sem, cgpa, skills, projects,
                certifications, internships, achievements, languages,
                github, linkedin, contact_email, status)
                VALUES
                ('$user_id', '$about', '$education', '$current_sem', '$cgpa',
                '$skills', '$projects', '$certifications', '$internships',
                '$achievements', '$languages', '$github', '$linkedin',
                '$contact_email', 'draft')";
    }
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "<script>alert('Portfolio Saved Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error Saving Portfolio');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4 p-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success">
                        Create Your Portfolio
                    </h2>
                    <p class="text-muted">
                        Fill in your portfolio details.
                    </p>
                </div>
                <form action="" method="POST">
                    <h4 class="mb-3 text-success">
                        Personal Information
                    </h4>
                    <div class="mb-3">
                        <label class="form-label">About</label>
                        <textarea
                            class="form-control"
                            name="about"
                            rows="4"
                            placeholder="Write something about yourself"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Contact Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="contact_email"
                            placeholder="Enter your contact email">
                    </div>
                    <hr>
                    <h4 class="mb-3 text-success">
                        Academic Information
                    </h4>
                    <div class="mb-3">
                        <label class="form-label">Education</label>
                        <textarea
                            class="form-control"
                            name="education"
                            rows="3"
                            placeholder="Enter your education details"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Semester</label>
                            <input
                                type="text"
                                class="form-control"
                                name="current_sem"
                                placeholder="Example: 3rd Semester">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CGPA</label>
                            <input
                                type="text"
                                class="form-control"
                                name="cgpa"
                                placeholder="Example: 9.30">
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3 text-success">
                        Professional Information
                    </h4>
                    <div class="mb-3">
                        <label class="form-label">Skills</label>
                        <textarea
                            class="form-control"
                            name="skills"
                            rows="3"
                            placeholder="HTML, CSS, PHP, JavaScript"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Projects</label>
                        <textarea
                            class="form-control"
                            name="projects"
                            rows="3"
                            placeholder="Mention your projects"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Certifications</label>
                        <textarea
                            class="form-control"
                            name="certifications"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Internships</label>
                        <textarea
                            class="form-control"
                            name="internships"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Achievements</label>
                        <textarea
                            class="form-control"
                            name="achievements"
                            rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Languages</label>
                        <textarea
                            class="form-control"
                            name="languages"
                            rows="2"></textarea>
                    </div>
                    <hr>
                    <h4 class="mb-3 text-success">
                        Online Profiles
                    </h4>
                    <div class="mb-3">
                        <label class="form-label">GitHub</label>
                        <input
                            type="url"
                            class="form-control"
                            name="github"
                            placeholder="https://github.com/username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LinkedIn</label>
                        <input
                            type="url"
                            class="form-control"
                            name="linkedin"
                            placeholder="https://linkedin.com/in/username">
                    </div>
                    <button
                        type="submit"
                        name="save_portfolio"
                        class="btn btn-success w-100">
                        Save Portfolio
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
