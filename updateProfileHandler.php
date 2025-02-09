<?php
include "connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        die("User is not logged in.");
    }

    // Get the logged-in user's username from the session
    $username = $_SESSION['username'];

    // Sanitize and escape form inputs
    $currentpassword = mysqli_real_escape_string($conn, $_POST['currentpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Check if the user exists and retrieve the current password
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if the user was found
    if (!$user) {
        die("User not found.");
    }

    // Compare the current password using md5 hash
    if (md5($currentpassword) !== $user['password']) {
        // Handle invalid current password
        echo "<script>alert('Invalid current password.'); window.location.href='user.php';</script>";
        exit;
    }

    // If new password is provided, update it
    if ($newpassword) {
        // Hash the new password using md5
        $newpassword = md5($newpassword);

        // Prepare and execute the update query for password
        $updatePasswordSQL = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($updatePasswordSQL);

        if (!$stmt) {
            die("SQL Error: " . $conn->error);
        }

        $stmt->bind_param("ss", $newpassword, $username);
        $stmt->execute();
    }

    // Update the phone number (if provided)
    if ($phone) {
        // Prepare and execute the update query for phone
        $updatePhoneSQL = "UPDATE users SET phone = ? WHERE username = ?";
        $stmt = $conn->prepare($updatePhoneSQL);

        if (!$stmt) {
            die("SQL Error: " . $conn->error);
        }

        $stmt->bind_param("ss", $phone, $username);
        $stmt->execute();
    }

    // Provide feedback and redirect
    echo "<script>alert('Profile updated successfully!'); window.location.href='userdashboard.php';</script>";
}
?>