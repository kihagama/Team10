<?php
include "connect.php";


if (isset($_POST['action']) && isset($_POST['booking_id'])) {
    $action = $_POST['action'];
    $booking_id = $_POST['booking_id'];

    if ($action === 'confirm') {
        $sql = "UPDATE booking SET status = 'confirmed' WHERE id = ?";
    } elseif ($action === 'cancel') {
        $sql = "UPDATE booking SET status = 'cancelled' WHERE id = ?";
    } elseif ($action === 'delete') {
        $sql = "DELETE FROM booking WHERE id = ?";
    } else {
        echo "Invalid action.";
        exit();
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>