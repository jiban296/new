<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Booking Confirmed</h2>
        <p id="confirmationDetails"></p>
        <a href="index.html" class="button">Back to Home</a>
    </div>

    <script>
        window.addEventListener("load", function() {
            const bookingDetails = JSON.parse(localStorage.getItem('bookingDetails'));
            if (bookingDetails && bookingDetails.location && bookingDetails.date && bookingDetails.time) {
                document.getElementById('confirmationDetails').textContent = `You have successfully booked ${bookingDetails.location.name}, ${bookingDetails.location.city} on ${bookingDetails.date} at ${bookingDetails.time}.`;
            } else {
                document.getElementById('confirmationDetails').textContent = 'Booking details not found.';
            }
        });
    </script>
</body>
</html>
