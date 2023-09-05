<?php
// Include the database configuration file
require_once 'db_config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON data received from the client
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract the date and time from the JSON data
    $date = $data['date'];
    $time = $data['time'];

    // Prepare the SQL query to insert the appointment
    $sql = "INSERT INTO appointments (date, time) VALUES ('$date', '$time')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If the appointment is successfully booked, send a success message
        echo "Appointment booked successfully!";
    } else {
        // If there is an error, provide an error message with details
        echo "Error: Unable to book the appointment. Please try again later. Error details: " . $conn->error;
    }
} else {
    // If the request method is not POST, display a user-friendly message
    echo "Invalid request method. Please use POST to book an appointment.";
}
?>

