<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle Add or Delete User Actions
    $action = $_POST['action'];

    if ($action == 'add') {
        // Get input data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Hash the password
        $role = $_POST['role']; // Role (0 or 1)

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $email, $password, $role);

        if ($stmt->execute()) {
            // Success - redirect with alert
            echo "<script>alert('User added successfully!'); window.location.href='admin.php';</script>";
        } else {
            // Failure - redirect with alert
            echo "<script>alert('Error adding user: " . $conn->error . "'); window.location.href='admin.php';</script>";
        }

        $stmt->close();
    } elseif ($action == 'delete') {
        // Delete a user
        $userId = $_POST['id'];

        // Ensure that the admin can't delete their own account (optional)
        if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == $userId) {
            // Prevent deleting own account
            echo "<script>alert('You cannot delete your own account!'); window.location.href='admin.php';</script>";
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $userId);

            if ($stmt->execute()) {
                // Success - redirect with alert
                echo "<script>alert('User deleted successfully!'); window.location.href='admin.php';</script>";
            } else {
                // Failure - redirect with alert
                echo "<script>alert('Error deleting user: " . $conn->error . "'); window.location.href='admin.php';</script>";
            }

            $stmt->close();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Handle Edit User Action
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Fetch user details for editing
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Populate the fields in the HTML form for editing the user details
        } else {
            echo "<script>alert('User not found.'); window.location.href='admin.php';</script>";
        }

        $stmt->close();
    }
}

// Close the connection
mysqli_close($conn);
?>