<?php
$data = json_decode(file_get_contents('php://input'), true);

$date = $data['date'];
$time = $data['time'];
$email = $data['email'];

// Database Connection (Replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swapnil";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the appointment data into the database
$sql = "INSERT INTO appointments (date, time, email) VALUES ('$date', '$time', '$email')";

if ($conn->query($sql) === TRUE) {
    // Send confirmation email
    $to = $email;
    $subject = "Appointment Confirmation";
    $message = "Your appointment has been booked for $date at $time.";
    $headers = "From: your_email@example.com"; // Replace with your email

    mail($to, $subject, $message, $headers);

    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
