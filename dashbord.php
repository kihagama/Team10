<?php

include "connect.php";
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['username']);

// Fetch user details if logged in
$userDetails = [];
if ($loggedIn) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $userDetails = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action']; // 'login' or 'signup'

    if ($action == 'login') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['profile_image'] = $user['profile_image']; // Assuming a 'profile_image' column exists
                echo json_encode(["status" => "success", "message" => "Login successful"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Invalid password"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "User not found"]);
        }
    } elseif ($action == 'signup') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(["status" => "error", "message" => "Username or email already exists"]);
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                echo json_encode(["status" => "success", "message" => "Registration successful"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error in registration"]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NanaAgricFarm</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav>
        <div class="logo">NanaAgricFarm</div>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <ul>
            <li><a href="aboutUs.php"><i class="fas fa-info-circle"></i> About Us</a></li>
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="product.php"><i class="fas fa-box"></i> Products</a></li>

            <?php if ($loggedIn): ?>
                <li><a href="profile.php"><i class="fas fa-user"></i> <?php echo $userDetails['username']; ?></a></li>
            <?php else: ?>
                <li><a href="#" id="login-link" onclick="openLoginForm()"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to NanaAgricFarms</h1>
            <p>Where agriculture meets the environment. Let's go green together.</p>
            <button>Get Started</button>
        </div>
    </div>

    <?php if ($loggedIn): ?>
        <section class="profile">
            <h2>Welcome, <?php echo $userDetails['username']; ?></h2>
            <img src="<?php echo $userDetails['profile_image'] ?: 'default-profile.png'; ?>" alt="Profile Image">
            <p>Email: <?php echo $userDetails['email']; ?></p>
            <h3>Your Bookings</h3>
            <ul>
                <!-- Fetch and display user bookings -->
                <li>Booking 1</li>
                <li>Booking 2</li>
            </ul>
        </section>
    <?php endif; ?>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 NanaAgricFarm. All rights reserved.</p>
    </footer>

    <script src="index.js"></script>
</body>

</html>