<!DOCTYPE html>
<html lang="en">
<head>
    <title>Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mains">
        <div class="navbar">
            <div class="icon">
			<img src="logo.png" style="width:150px">
            </div>
            <div class="menu">
                <ul>
					<li><a href="dashboard.php">DASHBOARD</a></li>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="records.php">RECORDS</a></li>
                    <li><a href="fines.php">FINES AND PENALTIES</a></li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                </ul>
            </div>  
	</div>
	<div style="margin-top: 100px;">
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

// SQL query to retrieve all data from a table
$sql = "SELECT * FROM violations";

// Execute the query
$result = $conn->query($sql);

// Check if any data was returned
if ($result->num_rows > 0) {
    // Output data of each row in an HTML table
	?>
    <table style="color:white">
	<?php
    echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>License Number</th><th>Type of Violation</th><th>Date Issued</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ViolationID"] . "</td>";
        echo "<td>" . $row["Fullname"] . "</td>";
		echo "<td>" . $row["Dateofbirth"] . "</td>";
		echo "<td>" . $row["Licensenumber"] . "</td>";
		echo "<td>" . $row["Typeofviolation"] . "</td>";
		echo "<td>" . $row["Date"] . "</td>";
        echo "<td><a href='delete.php?id=" . $row["ViolationID"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();
?> 
</div>
</div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>