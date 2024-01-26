<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a page after destroying the session (you can change the URL)
header("Location: login.php");
exit();

