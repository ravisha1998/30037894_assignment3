<?php
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the SCP number from the form
    $scpNumber = $_POST["scpNumber"];

    // Retrieve the existing record from the database
    $sql = "SELECT * FROM scpdata WHERE SCPNumber = '$scpNumber'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        // Get the updated values from the form
        $name = $_POST["name"];
        $class = $_POST["class"];
        $containmentProcedure = $_POST["containmentProcedure"];
        $description = $_POST["description"];

        // Update the record in the database
        $sql = "UPDATE scpdata SET Name = '$name', Class = '$class', ContainmentProcedure = '$containmentProcedure', Description = '$description' WHERE SCPNumber = '$scpNumber'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Record not found";
    }
}

// Close the database connection
$conn->close();
?>
