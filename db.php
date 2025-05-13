<?php
// Database connection settings
$servername = "localhost"; // Your database server (usually localhost)
$username = "root"; // Your database username (default is 'root' for XAMPP)
$password = ""; // Your database password (default is empty for XAMPP)
$dbname = "crud_db"; // The name of your database, which is 'crud_db'

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
