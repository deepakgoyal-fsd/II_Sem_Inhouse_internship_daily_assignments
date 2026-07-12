<?php
// checking the difference between include and require:
// include -> just a warning if the file is missing, script keeps running
// require -> fatal error if the file is missing, script stops right there

include 'header.php';
echo "Page Loaded (used include above)";

echo "<hr>";

require 'header.php';
echo "Page Loaded (used require above)";
?>
