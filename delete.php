<?php
include 'db.php'; // Database connection

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $driver_id = $_GET['id'];

    // Prepare and execute the delete query
    $delete_sql = "DELETE FROM drivers WHERE id = $driver_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Driver deleted successfully!";
        header('Location: index.php'); // Redirect back to the driver list
        exit;
    } else {
        echo "Error deleting driver: " . $conn->error;
    }
} else {
    echo "No ID parameter provided!";
    exit;
}
