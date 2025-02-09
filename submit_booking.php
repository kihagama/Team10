<?php
include "connect.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $user_id = $_POST['user-id'];
    $username = $_POST['booking-username'];
    $product_id = $_POST['product-id'];
    $productprice = $_POST['booking-price'];
    $contact_info = $_POST['booking-contact'];
    $booking_date = date('Y-m-d H:i:s'); // Current timestamp
    $status = 'pending'; // Default status

    // Prepare the SQL query to insert booking into the database
    $sql = "INSERT INTO booking (user_id, username, product_id, contact_info, booking_date, status, price) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Correct type definition: "isisssd"
        $stmt->bind_param("isisssd", $user_id, $username, $product_id, $contact_info, $booking_date, $status, $productprice);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Redirect to product page with a success message
            header("Location: product.php?message=booking_success");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>