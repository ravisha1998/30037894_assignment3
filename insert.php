<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost:3306";
$username = "a30037894_ravisha";
$password = "Ravisha123";
$dbname = "a30037894_scpdb";

// Establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $scpNumber = $_POST["scpNumber"];
    $name = $_POST["name"];
    $class = $_POST["class"];
    $containmentProcedure = $_POST["containmentProcedure"];
    $description = $_POST["description"];

    // Prepare and execute the SQL statement using prepared statements
    $stmt = $conn->prepare("INSERT INTO scpdata (SCPNumber, Name, Class, ContainmentProcedure, Description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $scpNumber, $name, $class, $containmentProcedure, $description);

    if ($stmt->execute()) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
