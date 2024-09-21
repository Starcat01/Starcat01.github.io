<?php
    session_start(); // Start the session

    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the sign-in page
    header("location: sign-in.php"); 
?>
