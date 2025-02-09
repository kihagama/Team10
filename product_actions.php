<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        // Handle Image Upload
        $image = $_FILES['image'];
        $imageName = time() . '_' . basename($image['name']);
        $imagePath = 'uploads/' . $imageName;

        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Insert into Database
            $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$imagePath')";
            if ($conn->query($sql)) {
                header('Location: admin.php');
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $sql = "DELETE FROM products WHERE id = $id";
        if ($conn->query($sql)) {
            header('Location: admin.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

mysqli_close($conn);
?>