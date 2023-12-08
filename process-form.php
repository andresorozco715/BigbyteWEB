<?php
$servername = "localhost";
$username = "id21639699_root";
$password = "Passw0rd()";
$database = "id21639699_bigbyte_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $dob = $_POST["dob"];
    $course = $_POST["course"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $creditCard = $_POST["credit-card"];
    $expiryDate = $_POST["expiry-date"];
    $cvv = $_POST["cvv"];

    // SQL query to insert data into the 'students' table
    $sql = "INSERT INTO students (name, surname, dob, course, email, password, credit_card, expiry_date, cvv) VALUES ('$name', '$surname', '$dob', '$course', '$email', '$password', '$creditCard', '$expiryDate', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
