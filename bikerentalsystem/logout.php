<?php
session_start();

// Destroy the session and delete the cookie
session_unset();
session_destroy();
setcookie('user_email', '', time() - 3600, '/');  // Expire the cookie

// Redirect to home page or login page
header("Location: index.php");
exit();
?>
