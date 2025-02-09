<?php
include 'connect.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password before storing it
    $hashedPassword = md5($password); // Use password_hash() for more secure hashing in production

    // Check if the username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If username or email exists, show an error
        echo "<script>alert('Username or Email already exists!'); window.location.href='index.php';</script>";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, email, phone, district, password) 
                        VALUES ('$username', '$email', '$phone', '$district', '$hashedPassword')";
        if (mysqli_query($conn, $insertQuery)) {
            // Redirect to login page after successful registration
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='index.php';</script>";
        } else {
            // Show error if registration fails
            echo "<script>alert('Registration failed. Please try again later.'); window.location.href='index.php';</script>";
        }
    }
}
?>