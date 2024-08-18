<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the sign-in page if not logged in
    header("Location: signin.php");
    exit();
}

// Include header or other necessary files
include 'header.php';

// Your index page content goes here
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My futsal</title>
    <link rel="stylesheet" href="ss.css">
</head>
<body>

<!-- Main Banner Section -->
<div class="banner">
    <div class="content">
        <h1>Welcome to Futsal Court</h1>
        <p>Book your futsal session with ease!</p>
        <div class="buttons">
            <button type="button" onclick="window.location.href='booking.php'"><span></span>BOOK NOW</button>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    }

    document.addEventListener('click', function (event) {
        var profile = document.querySelector('.profile');
        var dropdownMenu = document.getElementById('dropdownMenu');
        if (!profile.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
</script>

</body>
</html>
