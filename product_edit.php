<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input,
        textarea,
        button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Product</h2>

        <?php
        include 'connect.php';

        $id = $_GET['id'] ?? 0;
        $query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        ?>

        <form action="productupdate.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="existing_image" value="<?php echo $product['image']; ?>">

            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

            <label for="description">Description</label>
            <textarea id="description" name="description"
                required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required step="0.01">

            <label for="image">Product Image</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit">Update Product</button>
        </form>

        <?php mysqli_close($conn); ?>
    </div>

</body>

</html>