<?php
include 'connect.php'; // Include the database connection
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password to match the stored hashed password
    $password = md5($password); // Use password_hash() for more secure hashing in production

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result); // Fetch user data

        // Set session variables.
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] == 0) {
            header("Location: userdashboard.php");
        } elseif ($user['role'] == 1) {
            header("Location: admin.php");
        } else {
            echo "<script>alert('Invalid role!'); window.location.href='index.php';</script>";
        }
        exit();
    } else {
        // Show an error if login fails
        echo "<script>alert('Invalid username or password!'); window.location.href='index.php';</script>";
    }
}
?>
