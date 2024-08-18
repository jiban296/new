<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Date & Time</title>
    <link rel="stylesheet" href="selectingtime.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h2>Select a time</h2>
            <h3>1 Hr Gameplay</h3>
            <div class="calendar">
                <p>August 2024</p>
                <div class="calendar-grid">
                    <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                    <span></span><span></span><span></span><span></span><span></span><span>1</span><span>2</span>
                    <span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span class="selected-date">8</span><span>9</span>
                </div>
                <p>Thursday 8 August 2024</p>
                <div class="time-slots">
                    <button type="button" onclick="selectTime('8:00 AM')">8:00 AM</button>
                    <button type="button" onclick="selectTime('9:00 AM')">9:00 AM</button>
                    <button type="button" onclick="selectTime('10:00 AM')">10:00 AM</button>
                    <button type="button" onclick="selectTime('11:00 AM')">11:00 AM</button>
                    <button type="button" onclick="selectTime('12:00 PM')">12:00 PM</button>
                    <button type="button" onclick="selectTime('1:00 PM')">1:00 PM</button>
                    <button type="button" onclick="selectTime('2:00 PM')">2:00 PM</button>
                    <button type="button" onclick="selectTime('3:00 PM')">3:00 PM</button>
                    <button type="button" onclick="selectTime('4:00 PM')">4:00 PM</button>
                    <button type="button" onclick="selectTime('8:00 PM')">8:00 PM</button>
                    <button type="button" onclick="selectTime('9:00 PM')">9:00 PM</button>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="location-info">
                <img src="/img/futsal logo.jpg" alt="Futsal Logo">
                <h3 id="locationName">Loading...</h3>
                <p>5.0 ★ (1 review)</p>
                <p id="locationCity">Loading address...</p>
            </div>
            <div class="summary">
                <h4>Summary</h4>
                <p>1 Hr Gameplay</p>
                <p id="summaryLocation">Loading...</p>
                <p>Total to pay: Rs 1,050</p>
                <!-- One Form to Submit All Data -->
                <form action="booking.html" method="post">
                    <input type="hidden" name="name" id="inputLocationName" value="">
                    <input type="hidden" name="city" id="inputLocationCity" value="">
                    <input type="hidden" name="date" id="selectedDate" value="2024-08-08">
                    <input type="hidden" name="time" id="selectedTime" value="">
                    <button type="submit" class="button">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Retrieve the location details from localStorage
        const locationName = localStorage.getItem('futsalLocationName');
        const locationCity = localStorage.getItem('futsalLocationCity');

        // Update the location-info and summary sections
        document.getElementById('locationName').textContent = locationName;
        document.getElementById('locationCity').textContent = `${locationCity}, Tilottama, Lumbini, 32007`;
        document.getElementById('summaryLocation').textContent = `With ${locationName}`;

        // Update the hidden form fields
        document.getElementById('inputLocationName').value = locationName;
        document.getElementById('inputLocationCity').value = locationCity;

        // Function to select a time slot
        function selectTime(time) {
            document.getElementById('selectedTime').value = time;
        }
    </script>
</body>
</html>
