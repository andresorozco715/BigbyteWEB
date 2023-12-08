<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: student.html"); // Redirect to the login page if not logged in
    exit();
}

// Display the success message
echo "Login successful! Welcome, " . $_SESSION["username"] . ".<br>";

// Add a link to go to the home page
echo '<a href="index.html">Go to Home Page</a>';

// Add more content or redirection as needed
?>
