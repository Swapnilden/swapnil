<!DOCTYPE html>
<html>
<head>
  <title>Availability Summary</title>
</head>
<body>
  <h2>Availability Summary</h2>
  <?php
    $workingHours = $_POST['workingHours'];
    $breaks = $_POST['breaks'];
    $daysOff = $_POST['daysOff'];

    echo "<p><strong>Working Hours:</strong> $workingHours</p>";
    echo "<p><strong>Breaks:</strong> $breaks</p>";
    echo "<p><strong>Days Off:</strong> $daysOff</p>";
  ?>
</body>
</html>
