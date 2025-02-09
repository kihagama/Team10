<?php
include "connect.php";

// Start the session
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username from the session
$username = $_SESSION['username'];

// Fetch user data based on the username
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // Bind the username parameter
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}

// Save user details for later use
$userId = $user['id']; // Assuming 'id' is the primary key in the 'users' table
$userPhone = $user['phone']; // Assuming 'phone' is a column in the 'users' table



// Fetch user's bookings for products
$sql_product_booking = "SELECT 
                            b.*, 
                            p.name AS product_name, 
                            p.image AS product_image 
                        FROM booking b 
                        JOIN products p ON b.product_id = p.id 
                        WHERE b.user_id = ?";
$stmt_product_booking = $conn->prepare($sql_product_booking);
$stmt_product_booking->bind_param("i", $userId);
$stmt_product_booking->execute();
$result_product_booking = $stmt_product_booking->get_result();
if (isset($_GET['message']) && $_GET['message'] == 'booking_success') {
    echo "<script>alert('Booking successfully saved!');</script>";
}
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo "<script>alert('Booking successfully submitted!');</script>";
}
?>