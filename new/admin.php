<?php
session_start();
require_once 'db_connect.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch data for display
$users = $conn->query("SELECT * FROM users");
$locations = $conn->query("SELECT * FROM futsal_locations");
$bookings = $conn->query("SELECT bookings.*, users.firstname, users.lastname, futsal_locations.location_name FROM bookings JOIN users ON bookings.user_id = users.user_id JOIN futsal_locations ON bookings.location_id = futsal_locations.location_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <h2>Admin Dashboard</h2>
        <div class="admin-section">
            <h3>Manage Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><a href="edit_user.php?id=<?php echo $user['user_id']; ?>">Edit</a> | <a href="delete_user.php?id=<?php echo $user['user_id']; ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="admin-section">
            <h3>Manage Futsal Locations</h3>
            <table>
                <thead>
                    <tr>
                        <th>Location ID</th>
                        <th>Location Name</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($location = $locations->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $location['location_id']; ?></td>
                        <td><?php echo $location['location_name']; ?></td>
                        <td><?php echo $location['city']; ?></td>
                        <td><a href="edit_location.php?id=<?php echo $location['location_id']; ?>">Edit</a> | <a href="delete_location.php?id=<?php echo $location['location_id']; ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="admin-section">
            <h3>Manage Bookings</h3>
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>User Name</th>
                        <th>Location Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($booking = $bookings->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $booking['booking_id']; ?></td>
                        <td><?php echo $booking['firstname'] . ' ' . $booking['lastname']; ?></td>
                        <td><?php echo $booking['location_name']; ?></td>
                        <td><?php echo $booking['date']; ?></td>
                        <td><?php echo $booking['time']; ?></td>
                        <td><a href="edit_booking.php?id=<?php echo $booking['booking_id']; ?>">Edit</a> | <a href="delete_booking.php?id=<?php echo $booking['booking_id']; ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
