<?php
include 'db.php'; // Database connection

// Check if an 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $driver_id = $_GET['id'];

    // Fetch the driver's data from the database based on the id
    $sql = "SELECT * FROM drivers WHERE id = $driver_id";
    $result = $conn->query($sql);

    // Check if a record is found for the given id
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Driver not found!";
        exit;
    }
} else {
    echo "No ID parameter provided!";
    exit;
}

// Handle the form submission for updating the driver's details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $bus_number = $_POST['bus_number'];
    $license_number = $_POST['license_number'];
    $salary = $_POST['salary'];

    // Update the driver's data in the database
    $update_sql = "UPDATE drivers SET 
        name = '$name',
        age = '$age',
        start_time = '$start_time',
        end_time = '$end_time',
        bus_number = '$bus_number',
        license_number = '$license_number',
        salary = '$salary'
        WHERE id = $driver_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Driver updated successfully!";
        header('Location: index.php'); // Redirect back to the driver list
        exit;
    } else {
        echo "Error updating driver: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Driver - CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Edit Driver Details</h2>

    <form method="POST" action="edit.php?id=<?php echo $driver_id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required><br><br>

        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time" name="start_time" value="<?php echo $row['start_time']; ?>" required><br><br>

        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" value="<?php echo $row['end_time']; ?>" required><br><br>

        <label for="bus_number">Bus Number:</label>
        <input type="text" id="bus_number" name="bus_number" value="<?php echo $row['bus_number']; ?>" required><br><br>

        <label for="license_number">License Number:</label>
        <input type="text" id="license_number" name="license_number" value="<?php echo $row['license_number']; ?>" required><br><br>

        <label for="salary">Salary:</label>
        <input type="number" step="0.01" id="salary" name="salary" value="<?php echo $row['salary']; ?>" required><br><br>

        <button type="submit">Update Driver</button>
    </form>

    <br>
    <a href="index.php" class="btn">Back to Driver List</a>

</body>
</html>
