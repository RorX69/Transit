<?php
include 'db.php'; // Assuming you have this file for database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver List - CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Driver List</h2>
    <a href="add.php" class="btn">Add New Driver</a> <!-- Link to add new driver -->
    <table>
        <thead>
            <tr>
                <th>Driver ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Bus Number</th>
                <th>License Number</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // SQL query to fetch all driver records from the 'drivers' table
            $sql = "SELECT * FROM drivers";
            $result = $conn->query($sql);

            // Check if there are records and display them
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>             <!-- Display Driver ID -->
                            <td>".$row['name']."</td>           <!-- Display Driver Name -->
                            <td>".$row['age']."</td>            <!-- Display Driver Age -->
                            <td>".$row['start_time']."</td>     <!-- Display Start Time -->
                            <td>".$row['end_time']."</td>       <!-- Display End Time -->
                            <td>".$row['bus_number']."</td>     <!-- Display Bus Number -->
                            <td>".$row['license_number']."</td> <!-- Display License Number -->
                            <td>".$row['salary']."</td>         <!-- Display Salary -->
                            <td>
                                <a href='edit.php?id=".$row['id']."' class='btn'>Edit</a> <!-- Edit button -->
                                <a href='delete.php?id=".$row['id']."' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this driver?\")'>Delete</a> <!-- Delete button -->
                            </td>
                          </tr>"; 
                }
            } else {
                // Message when there are no records
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
