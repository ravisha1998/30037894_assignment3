<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SCP">
    <meta name="author" content="Ravisha">
    <title>SCP</title>

    <!-- website title logo-->

    <link rel="icon" href="imgs/scp-title-logo.png" type="image/icontype">

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="assets/vendors/animate/animate.css">

    <!-- Bootstrap and main styles -->
    <link rel="stylesheet" href="scp.css">

    <style>
        .entry-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand m-auto" href="#">
                <img src="imgs/scp-title-logo.png" class="brand-img" alt="">
                <span class="brand-txt">SCP FOUNDATION</span>
            </a>
        </div>
    </nav>

    <!-- header -->
    <header id="header" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">SCP FOUNDATION</h1>
            <h3 class="display-5">Secure. Contain. Protect.</h3>
            &nbsp;
            <a class="btn btn-lg btn-primary" href="#aboutscp">View SCP</a>
        </div>
    </header>

    <!--  ABOUT Section  -->
    <div id="aboutscp" class="container-fluid wow fadeIn" data-wow-duration="1.5s">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
                        <div id="root"></div>
                        <!-- SCP Data Entry Form (Create Function) -->
                        <h1>SCP Record Entry Form</h1>
                        &nbsp;
                        <form action="insert.php" method="POST" class="entry-form">
                            <div class="form-group">
                                <label for="scpNumber">SCP#:</label>
                                <input type="text" name="scpNumber" id="scpNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="class">Class:</label>
                                <input type="text" name="class" id="class" required>
                            </div>
                            <div class="form-group">
                                <label for="containmentProcedure">Containment Procedure:</label>
                                <textarea name="containmentProcedure" id="containmentProcedure" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" required></textarea>
                            </div>
                            <input type="submit" value="Submit">
                        </form>

                        <br> 
                        
                        <!-- SCP Data Records (Read Function) -->
                        <h1>SCP Records</h1>
                        &nbsp;

                        <table>
                            <tr>
                                <th>SCP#</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Containment Procedure</th>
                                <th>Description</th>
                            </tr>
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

                            // Retrieve data from the database
                            $sql = "SELECT SCPNumber, Name, Class, ContainmentProcedure, Description FROM scpdata";
                            $result = $conn->query($sql);

                            // Display the retrieved data
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["SCPNumber"] . "</td>";
                                    echo "<td>" . $row["Name"] . "</td>";
                                    echo "<td>" . $row["Class"] . "</td>";
                                    echo "<td>" . $row["ContainmentProcedure"] . "</td>";
                                    echo "<td>" . $row["Description"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records found.</td></tr>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </table>

                        <br>
                        &nbsp;
                        
                        <!-- Update SCP Data Records (Update Function) -->
                        <h1>Update SCP Records</h1>

                        <form action="update.php" method="POST" class="entry-form">
                            <div class="form-group">
                                <label for="scpNumber">SCP#:</label>
                                <input type="text" name="scpNumber" id="scpNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="class">Class:</label>
                                <input type="text" name="class" id="class" required>
                            </div>
                            <div class="form-group">
                                <label for="containmentProcedure">Containment Procedure:</label>
                                <textarea name="containmentProcedure" id="containmentProcedure" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" required></textarea>
                            </div>
                            <input type="submit" value="Update">
                        </form>

                        <br>
                        &nbsp;

                        
                        
    <!-- Delete SCP Record (Delete Function)-->
    <h1> Delete SCP Record </h1>


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

// Check if SCP number is provided
if (isset($_GET["scpNumber"])) {
    // Sanitize SCP number input
    $scpNumber = $_GET["scpNumber"];
    $scpNumber = $conn->real_escape_string($scpNumber);

    // Delete the record from the database
    $sql = "DELETE FROM scpdata WHERE SCPNumber = '$scpNumber'";
    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully, redirect back to index.php
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve data from the database
$sql = "SELECT SCPNumber, Name, Class, ContainmentProcedure, Description FROM scpdata";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

  
    <table>
        <tr>
            <th>SCP#</th>
            <th>Name</th>
            <th>Class</th>
            <th>Containment Procedure</th>
            <th>Description</th>
            <th>Delete</th>
        </tr>
        <?php
        // Display the retrieved data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SCPNumber"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Class"] . "</td>";
                echo "<td>" . $row["ContainmentProcedure"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td><a href=\"index.php?scpNumber=" . $row["SCPNumber"] . "\">Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found.</td></tr>";
        }
        ?>
    </table>

                        <!-- Closing PHP tag -->
                        <?php
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- page footer  -->

    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; <?php echo date("Y"); ?> SCP Foundation. All rights reserved.</p>
    </div>

    <!-- SCRIPTS -->
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>