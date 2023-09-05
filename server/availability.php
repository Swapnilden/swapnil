<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM availability";
    $result = $conn->query($sql);
    
    $availability = [];
    while ($row = $result->fetch_assoc()) {
        $availability[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($availability);
}
?>
