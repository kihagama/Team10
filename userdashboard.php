<?php
include 'producthandle.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NanaAgricFarm</title>
    <!-- Favicon placeholder -->
    <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
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
    <!-- Navigation -->
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
    <!-- Modals -->
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


    <!-- Update Profile Modal -->
    <div id="updateProfileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('updateProfileModal')">&times;</span>
            <h2>Update Profile</h2>
            <form action="updateProfileHandler.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username"
                    value="<?php echo htmlspecialchars($user['username']); ?>" required readonly>

                <label for="currentpassword">Current Password:</label>
                <input type="password" name="currentpassword" id="currentpassword" placeholder="Enter current password"
                    required>

                <label for="newpassword">New Password:</label>
                <input type="password" name="newpassword" id="newpassword" placeholder="Enter new password">

                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"
                    required>

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to NanaAgricFarms</h1>
            <p>Where agriculture meets the environment. Let's go green together.</p>
            <button style="background-color:white; border:none; padding:10px 20px; cursor:pointer;"
                onmouseover="this.style.backgroundColor='#1e90ff'; this.querySelector('a').style.color='white';"
                onmouseout="this.style.backgroundColor='white'; this.querySelector('a').style.color='#1e90ff';">
                <a style="color:#1e90ff; text-decoration:none;" href="product.php">Buy now</a>
            </button>

        </div>
    </div>


    <!--statistic section-->
    <section class="statistics">
        <div class="stat-item">
            <img src="ImagesAg/banana.JPG" alt="Products Delivered">
            <h2>500+ Products Delivered</h2>
            <p>We have successfully delivered over 500 products to our satisfied customers.</p>
        </div>
        <div class="stat-item">
            <img src="ImagesAg/team-1.jpg" alt="Farmers Trained">
            <h2>50+ Farmers Trained</h2>
            <p>Over 50 farmers have benefited from our training programs, improving their agricultural skills.</p>
        </div>
        <div class="stat-item">
            <img src="ImagesAg/mango1.JPG" alt="Increase in Yield">
            <h2>30% Increase in Yield</h2>
            <p>Our innovative farming techniques have led to a 30% increase in crop yield.</p>
        </div>
    </section>
    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

    <script>
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