<?php
// =========================================================
// HISTORY.PHP
// =========================================================
// This file simply redirects to the homepage's history
// section. All history is actually shown inside index.php
// (Fetch History query), so this file exists mainly to keep
// the project's folder structure complete and to make future
// improvements (like a dedicated history page) easy to add.
// =========================================================

header("Location: index.php#history");
exit();
?>
