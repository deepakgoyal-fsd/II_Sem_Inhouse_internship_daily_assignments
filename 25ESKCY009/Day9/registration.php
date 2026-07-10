<?php
include("db_connect.php");
// Simple POST receiver: validates and displays form input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = [];
	$name  = trim($_POST['txtName']  ?? '');
	$email = trim($_POST['txtEmail'] ?? '');
	$phone = trim($_POST['txtPhone'] ?? '');

	if ($name === '') $errors[] = 'Name is required.';
	if ($email === '') $errors[] = 'Email is required.';
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email.';
	if ($phone === '') $errors[] = 'Phone is required.';
	elseif (!ctype_digit($phone)) $errors[] = 'Phone must be digits only.';

	header('Content-Type: text/html; charset=utf-8');
} else {
	$errors = ['No POST data received.'];
	$name = $email = $phone = '';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Result</title>
	<style>body{font-family:Arial;padding:20px}</style>
</head>
<body>
<?php if (!empty($errors)): ?>
	<h2>Errors</h2>
	<ul>
		<?php foreach ($errors as $e): ?>
			<li><?php echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></li>
		<?php endforeach; ?>
	</ul>
	<p><a href="file1.html">Back to form</a></p>
<?php else: ?>
	<h2>Submitted</h2>
	<p>Name: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
	<p>Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
	<p>Phone: <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>
</body>
</html>

