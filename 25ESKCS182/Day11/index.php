<!--check if user is logged in, if not redirect to login page -->
<?php
session_start();

if (empty($_SESSION['user_id']) && empty($_SESSION['user_name']) && empty($_SESSION['username']) && empty($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}


?>

<!-- page content Header-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my website</title>
    

    <!-- bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"">
</head>
<body>
    <header class="bg-border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

            <!-- logo -->
             <img src="https://www.vhv.rs/dpng/d/549-5499076_hd-logo-design-transparent-background-hd-png-download.png" alt="Logo" class="logo-img" style="width: 80px; height: 50px;">
                    <div class="logo">
                    <h1 class="m-0">My Website</h1>
                </div>
                <!-- navigation menu -->
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
              <!--  <a href="login.php"><button type="button" class="btn btn-primary">Log in </button></a> -->
            </div>
        </div>
    </header>

<!--  Middle page -->


<!DOCTYPE html>
<html lang="en">
<head>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
<h2 class="text-center mb-4">Student Records</h2>
<input type="text" id="search" class="form-control mb-4" placeholder="Search Student">
<div id="container" class="row g-4"></div>
</div>
<script>
let users = [];
function renderUsers(filter = "") {
const searchTerm = filter.toLowerCase().trim();
const filteredUsers = users.filter(user => {
return (
user.name.toLowerCase().includes(searchTerm) ||
user.phone.toLowerCase().includes(searchTerm) ||
String(user.id).includes(searchTerm)
);
});
let html = "";
filteredUsers.forEach(user => {
html += `
<div class="col-md-4 card-item">
<div class="card shadow">
<div class="card-body">
<h4>${user.name}</h4>
<button class="btn btn-primary btn-sm mt-2 show-btn">
Show Details
</button>
<div class="details mt-3" style="display:none;">
<img src="https://www.sourcesplash.com/i/random?q=person/300?img=${user.id}" alt="${user.name}" class="img-fluid rounded mb-3">
<p><strong>ID:</strong> ${user.id}</p>
<p><strong>Phone:</strong> ${user.phone}</p>
</div>
</div>
</div>
</div>
`;
});
$("#container").html(html);
}
$(document).on("click", ".show-btn", function () {
$(this).next(".details").slideToggle();
});
$("#search").on("input", function () {
renderUsers($(this).val());
});
fetch("https://jsonplaceholder.typicode.com/users")
.then(response => response.json())
.then(data => {
users = data;
renderUsers();
})
.catch(error => console.error(error));
</script>
</body>
</html>

<?php include('footer.php'); ?>
