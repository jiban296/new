<!-- <?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $user_id = $_POST['user_id']; // Assume you have a session or some way to get the user ID
    $futsal_name = $_POST['futsal_name'];
    $location = $_POST['location'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $amount = $_POST['amount'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO Bookings (user_id, futsal_name, location, booking_date, booking_time, amount) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssd", $user_id, $futsal_name, $location, $booking_date, $booking_time, $amount);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Booking confirmed!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?> -->
