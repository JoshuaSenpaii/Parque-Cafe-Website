<?php

session_start();

if(isset($_SESSION['email'])) {
    // Session variable 'username' exists, user is logged in
    // Proceed with the page content

} else {
    // Redirect user to login page or show an error message
    echo'<script> alert("You must be logged in to view this page."); window.location = "index.php";</script>';
    // header("Location: index.php");
    exit();
}


?>
