<?php
session_start();
require_once 'db_connect.php';

if (isset($_POST['submit'])) {
    // Sanitize and validate user input
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Prepared statement to fetch user data
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start the session
            $_SESSION['user_id'] = $id;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('No account found with that email. Please try again.')</script>";
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="form">
        <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#login" role="tab" data-toggle="tab">Log in</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="login">
                    <form id="login-form" method="POST" action="">
                        <div class="form-group">
                            <label for="email">Email<span class="req">*</span></label>
                            <input type="email" class="form-control" id="email" required name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span class="req">*</span></label>
                            <input type="password" class="form-control" id="password" required name="password">
                        </div>
                        <div class="mrgn-30-top">
                            <button type="submit" name="submit" class="btn btn-larger btn-block">Log in</button>
                        </div>
                    </form>
                    <p class="para-2">
                        Not have an account? <a href="signup.php">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
