<?php
require_once 'db_connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Check if all required POST variables are set
    if (isset($_POST['name']) && isset($_POST['city']) && isset($_POST['date']) && isset($_POST['time'])) {
        // Get data from the form
        $name = htmlspecialchars($_POST['name']);
        $city = htmlspecialchars($_POST['city']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO bookings (name, city, date, time) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssss", $name, $city, $date, $time);

        if ($stmt->execute()) {
            echo "New booking created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: Missing required fields.";
    }
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Location</title>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <div class="modal">
        <div class="modal-content">
            <h2><i class="location-icon"></i> Please Select Location</h2>
            <p>Select the futsal court near your location</p>
            <div class="locations">
                <div class="location" onclick="selectLocation('Unique Futsal', 'Shankarpur')">
                    <div class="location-icon"></div>
                    <div class="location-text">
                        <h3>Unique Futsal</h3>
                        <p>Shankarpur</p>
                    </div>
                </div>
                <div class="location" onclick="selectLocation('Mona Lisa Futsal', 'Janakinagar')">
                    <div class="location-icon"></div>
                    <div class="location-text">
                        <h3>Mona Lisa Futsal</h3>
                        <p>Janakinagar</p>
                    </div>
                </div>
                <div class="location" onclick="selectLocation('Lumbini Futsal', 'Yogikuti')">
                    <div class="location-icon"></div>
                    <div class="location-text">
                        <h3>Lumbini Futsal</h3>
                        <p>Yogikuti</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectLocation(name, city) {
            localStorage.setItem('futsalLocationName', name);
            localStorage.setItem('futsalLocationCity', city);
            window.location.href = 'selectingtime.php';
        }
    </script>
</body>
</html>

