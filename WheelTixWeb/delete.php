<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WheelTixDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM violations WHERE ViolationID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request";
}
// Close the database connection
$conn->close();
header("Location: http://localhost/wheeltix/WheelTixWeb/records.php");
exit();
?>