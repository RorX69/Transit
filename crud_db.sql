-- Create a database (if not already created)
CREATE DATABASE IF NOT EXISTS your_database_name;

-- Use the database
USE your_database_name;

-- Create the drivers table
CREATE TABLE IF NOT EXISTS drivers (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Driver ID (Auto Increment)
    name VARCHAR(100) NOT NULL,             -- Driver's Name
    age INT NOT NULL,                      -- Driver's Age
    start_time TIME NOT NULL,              -- Start Time of the Shift
    end_time TIME NOT NULL,                -- End Time of the Shift
    bus_number VARCHAR(50) NOT NULL,       -- Bus Number
    license_number VARCHAR(50) NOT NULL,   -- Driver's License Number
    salary DECIMAL(10, 2) NOT NULL         -- Driver's Salary (up to 2 decimal places)
);

-- Insert some sample data into the drivers table
INSERT INTO drivers (name, age, start_time, end_time, bus_number, license_number, salary)
VALUES
('John Doe', 35, '08:00:00', '16:00:00', 'A123', 'LIC12345', 35000.00),
('Jane Smith', 28, '09:00:00', '17:00:00', 'B456', 'LIC67890', 28000.00),
('Michael Johnson', 40, '10:00:00', '18:00:00', 'C789', 'LIC11223', 40000.00);

-- Check the table's contents (for debugging purposes)
SELECT * FROM drivers;
