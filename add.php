<?php
include 'db.php'; // Include the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $bus_number = $_POST['bus_number'];
    $license_number = $_POST['license_number'];
    $salary = $_POST['salary'];

    // Prepare and bind the insert query
    $stmt = $conn->prepare("INSERT INTO drivers (name, age, start_time, end_time, bus_number, license_number, salary) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssss", $name, $age, $start_time, $end_time, $bus_number, $license_number, $salary);

    // Execute the query
    if ($stmt->execute()) {
        echo "New driver added successfully!";
        header('Location: index.php'); // Redirect to the main page after adding
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Driver</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Add New Driver</h2>

    <form action="add.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required><br>

        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" required><br>

        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" required><br>

        <label for="bus_number">Bus Number:</label>
        <input type="text" name="bus_number" id="bus_number" required><br>

        <label for="license_number">License Number:</label>
        <input type="text" name="license_number" id="license_number" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" step="0.01" required><br>

        <input type="submit" value="Add Driver">
    </form>

    <a href="index.php" class="btn">Back to Driver List</a>

</body>
</html>
