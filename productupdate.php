<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $existing_image = $_POST['existing_image'];

    // Handle file upload
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        // Check if the uploads directory exists, if not, create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $image_name;

            // Delete the old image if a new one is uploaded
            if (!empty($existing_image) && file_exists($target_dir . $existing_image)) {
                unlink($target_dir . $existing_image);
            }
        } else {
            echo "Error uploading the image.";
            exit();
        }
    } else {
        $image_path = $existing_image;
    }

    // Update query
    $query = "UPDATE products SET name='$name', description='$description', price='$price', image='$image_path' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('product update successfuly')</script>";
        header("Location: admin.php"); // Redirect to the products list page
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>