<?php
session_start();
require_once 'db_connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $firstname = htmlspecialchars($_POST['first_name']);
    $lastname = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $firstname, $lastname, $email, $phone, $hashedPassword);

    if ($stmt->execute()) {
        // After successful signup, redirect to the sign-in page
        header("Location: signin.php");
        exit();
    } else {
        echo "<script>alert('Insertion failed: " . $conn->error . "')</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="form">
        <div class="container">
            <div class="col-lg-6 col-lg-offset-3">
                <div id="userform">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active"><a href="#signup" role="tab" data-toggle="tab">Sign up</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="signup">
                            <form id="signup-form" method="POST" action="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name<span class="req">*</span></label>
                                            <input type="text" class="form-control" id="firstname" required name="firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Last Name<span class="req">*</span></label>
                                            <input type="text" class="form-control" id="lastname" required name="lastname">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span class="req">*</span></label>
                                    <input type="email" class="form-control" id="email" required name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone<span class="req">*</span></label>
                                    <input type="tel" class="form-control" id="phone" required name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span class="req">*</span></label>
                                    <input type="password" class="form-control" id="password" required name="password">
                                </div>
                                <div class="mrgn-30-top">
                                    <button type="submit" name="submit" class="btn btn-larger btn-block">Sign up</button>
                                </div>
                            </form>
                            <p class="para-2">
                                Already have an account? <a href="signin.php">Login here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
