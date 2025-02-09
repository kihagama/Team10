<?php
include 'producthandle.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NanaAgricFarm</title>
    <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="produc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .form-container form {
            display: block;
        }

        .form-container form label {
            color: white;
        }

        .overlay {
            position: fixed;
            top: -30%;
            left: 40%;
            width: 50%;
            height: 0%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Booking Card Styling */
        .booking-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .booking-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fff;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .booking-card:hover {
            transform: translateY(-5px);
        }

        .booking-image {
            height: 180px;
            overflow: hidden;
            background: #f9f9f9;
        }

        .booking-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .booking-header {
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-align: center;
        }

        .booking-header h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .booking-body {
            padding: 15px;
            line-height: 1.5;
        }

        .booking-status {
            display: inline-block;
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #ffc107;
            color: #000;
            font-size: 0.9rem;
        }

        .booking-status.pending {
            background-color: #ffc107;
        }

        .booking-status.confirmed {
            background-color: #28a745;
            color: #fff;
        }

        .booking-status.cancelled {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">NanaAgricFarm</div>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <ul>

            <li><a href="userdashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="product.php"><i class="fas fa-box"></i> Products</a></li>

            <li>
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-user-circle"></i> Profile: <?php echo htmlspecialchars($username); ?>
                    </button>
                    <div class="dropdown-content">
                        <a href="#" onclick="openModal('myProductModal')"><i class="fas fa-box"></i> My Product</a>

                        <a href="#" onclick="openModal('updateProfileModal')"><i class="fas fa-user-edit"></i> Update
                            Profile</a>
                        <a href="index.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- My Product Modal -->
    <div id="myProductModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('myProductModal')">&times;</span>
            <h2>My Bookings</h2>
            <p>Here, are your booking details.</p>
            <ul class="booking-list">
                <?php
                if ($result_product_booking->num_rows > 0) {
                    while ($booking = $result_product_booking->fetch_assoc()) {
                        echo "
        <li class='booking-card'>
            <div class='booking-image'>
                <img src='" . htmlspecialchars($booking['product_image']) . "' alt='" . htmlspecialchars($booking['product_name']) . "'>
            </div>
            <div class='booking-header'>
                <h3>" . htmlspecialchars($booking['product_name']) . "</h3>
                <span class='booking-status " . htmlspecialchars($booking['status']) . "'>" . ucfirst($booking['status']) . "</span>
            </div>
            <div class='booking-body'>
                <p><strong>Price:</strong> shs. " . htmlspecialchars($booking['price']) . "</p>
                <p><strong>Contact:</strong> " . htmlspecialchars($booking['contact_info']) . "</p>
                <p><strong>Date:</strong> " . htmlspecialchars($booking['booking_date']) . "</p>
            </div>
        </li>";
                    }
                } else {
                    echo "<li class='no-booking'>No bookings found.</li>";
                }
                ?>
            </ul>

        </div>
    </div>

    <!-- My Training Modal -->
    <div id="myTrainingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('myTrainingModal')">&times;</span>
            <h2>My Training Sessions</h2>
            <p>Here, are your training session details.</p>
            <ul class="booking-list">
                <?php
                if ($result_training_booking->num_rows > 0) {
                    while ($booking = $result_training_booking->fetch_assoc()) {
                        echo "
                <li class='booking-card'>
                    <div class='booking-header'>
                        <img src='" . htmlspecialchars($booking['officer_photo']) . "' alt='Officer Photo' class='officer-photo'>
                        <h3>" . htmlspecialchars($booking['officer_name']) . " (" . htmlspecialchars($booking['officer_specialty']) . ")</h3>
                        <span class='booking-status " . htmlspecialchars($booking['status']) . "'>" . ucfirst($booking['status']) . "</span>
                    </div>
                    <div class='booking-body'>
                        <p><strong>Date:</strong> " . htmlspecialchars($booking['booking_date']) . "</p>
                        <p><strong>Time:</strong> " . htmlspecialchars($booking['booking_time']) . "</p>
                    </div>
                </li>";
                    }
                } else {
                    echo "<li class='no-booking'>No training sessions booked.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Update Profile Modal -->
    <div id="updateProfileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('updateProfileModal')">&times;</span>
            <h2>Update Profile</h2>
            <form action="updateProfileHandler.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username"
                    value="<?php echo htmlspecialchars($user['username']); ?>" required>

                <label for="currentpassword">Current Password:</label>
                <input type="password" name="currentpassword" id="currentpassword" required>

                <label for="newpassword">New Password:</label>
                <input type="password" name="newpassword" id="newpassword">

                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"
                    required>

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <section class="product-section" id="products">
        <div class="product-container">
            <?php
            include 'connect.php';

            // Fetch products from the database
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                $imagePath = htmlspecialchars($row['image']);
                echo "
            <div class='product-card'>
                <img src='$imagePath' alt='{$row['name']}' class='product-image'>
                <h3 class='product-name'>{$row['name']}</h3>
                <p class='product-description'>{$row['description']}</p>
                <p class='product-price'>shs. {$row['price']}</p>
                <button class='buy-button' onclick=\"showOverlayForm('{$row['id']}', '{$row['name']}', '{$row['price']}', '$userId', '$userPhone','$username')\">Buy Now</button>
            </div>
            ";
            }
            ?>
        </div>
    </section>

    <!-- Overlay for booking form -->
    <div id="booking-overlay" class="overlay">
        <div class="form-container">
            <button class="close-btn" onclick="closeBookingForm()">×</button>

            <h2>Booking</h2>

            <form action="submit_booking.php" method="POST">
                <label for="booking-name">Product:</label>
                <input type="text" id="booking-name" name="booking-name" placeholder="Product Name" readonly required>

                <label for="booking-price">Price:</label>
                <input type="text" id="booking-price" name="booking-price" placeholder="Product Price" readonly
                    required>

                <label for="booking-contact">Your contact:</label>
                <input type="text" id="booking-contact" name="booking-contact" readonly required>

                <label for="booking-username">Your username:</label>
                <input type="text" id="booking-username" name="booking-username" readonly required>

                <input type="hidden" id="product-id" name="product-id" value="">
                <input type="hidden" id="user-id" name="user-id" value="">

                <button type="submit" class="btn-submit">Confirm Order</button>
            </form>
        </div>
    </div>
    <?php
    include 'footer.php'
        ?>

    <script>
        // Example function to load products dynamically
        async function loadProducts() {
            try {
                const response = await fetch('path/to/your/database/api'); // Replace with your database endpoint
                const products = await response.json();

                const productSection = document.getElementById('products');
                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('product-card');

                    productCard.innerHTML = `
                        <img src="${product.image}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <button onclick="buyProduct(${product.id})">Buy</button>
                    `;

                    productSection.appendChild(productCard);
                });
            } catch (error) {
                console.error('Error loading products:', error);
            }
        }

        function showOverlayForm(productId, productName, productPrice, userId, userPhone, username) {
            document.getElementById('product-id').value = productId;
            document.getElementById('booking-name').value = productName;
            document.getElementById('booking-price').value = productPrice;
            document.getElementById('user-id').value = userId; // Populate the user ID
            document.getElementById('booking-contact').value = userPhone; // Populate the phone number
            document.getElementById('booking-username').value = username; // Populate the username
            document.getElementById('booking-overlay').style.display = 'block';
        }


        function closeBookingForm() {
            document.getElementById('booking-overlay').style.display = 'none';
        }

        // Open modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        // Close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function (event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        }

    </script>


    <script src="index.js"></script>
</body>

</html>