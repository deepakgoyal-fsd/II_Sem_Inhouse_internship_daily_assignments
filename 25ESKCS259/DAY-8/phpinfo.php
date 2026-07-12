<?php
// ============================================
// PHP INFO FUNCTION
// ============================================

echo "<h1>PHP Information</h1>";
echo "<p>The phpinfo() function displays detailed information about your PHP installation.</p>";

// Display all PHP information
phpinfo();

// Alternative: You can pass flags to show specific information
// phpinfo(INFO_GENERAL);        // General Information
// phpinfo(INFO_CREDITS);        // PHP Credits
// phpinfo(INFO_CONFIGURATION);  // Configuration (php.ini)
// phpinfo(INFO_MODULES);        // Loaded modules
// phpinfo(INFO_ENVIRONMENT);    // Environment variables
// phpinfo(INFO_VARIABLES);      // Predefined variables
// phpinfo(INFO_LICENSE);        // License information
// phpinfo(INFO_ALL);            // All information (default)

?>
