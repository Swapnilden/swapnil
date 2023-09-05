<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'];
    $subject = "Appointment Confirmation";
    $message = "Your appointment has been confirmed for " . $data['date'] . " at " . $data['time'];

    mail($email, $subject, $message);

    echo "Confirmation email sent!";
}
?>
