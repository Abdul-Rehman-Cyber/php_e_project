<?php
session_start();
session_destroy();

// Redirect using PHP header (preferred way)
header("Location: index.php");
exit(); // Prevent further script execution
?>
