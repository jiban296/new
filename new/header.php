<?php

// Assuming you've set $_SESSION['email'] in a previous part of your code
if (isset($_SESSION['email'])) {
    echo "<a href='#'>" . htmlspecialchars($_SESSION['email']) . "</a>";
} else {

}
?>
   
   <header>
        <div class="navbar">
            <img src="img/futsal logo.jpg" alt="Logo" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
            </ul>
            <div class="profile" onclick="toggleDropdown()">
                <img src="img/profile-icon-design-free-vector.jpg" alt="Profile Picture">
                <div class="dropdown-menu" id="dropdownMenu">
                    <?php
                     if (isset($_SESSION['user_id'])): ?>
                        <a href="#"><?php echo htmlspecialchars($_SESSION['email']); ?></a>
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    <?php else: ?>
                        <a href="signin.php">Sign In</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('show');
        }
    </script>


