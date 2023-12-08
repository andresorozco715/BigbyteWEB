<?php
session_start();

// Update these with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bigbyte_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from the form
$username = $_POST["username"];
$password = $_POST["password"];

// Validate email format
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "Error: Invalid email format";
} else {
    // Check if the username exists in the database
    $sql = "SELECT * FROM students WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username exists, check the password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start a session
            $_SESSION["username"] = $username;
            header("Location: login-success.php"); // Redirect to the success page
        } else {
            echo "Error: Incorrect password";
        }
    } else {
        echo "Error: Username not found";
    }
}

$conn->close();
?>
