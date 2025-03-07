<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NanaAgricFarm</title>
    <!-- Favicon placeholder -->
    <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Alert overlay background */
        .alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            /* Semi-transparent black */
            display: none;
            /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Alert box */
        .alert-box {
            background: #fff;
            border-radius: 10px;
            padding: 20px 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.3s ease;
        }

        /* Alert message */
        #alert-message {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 15px;
        }

        /* OK button */
        .alert-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .alert-btn:hover {
            background-color: #45a049;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav>
        <div class="logo">NanaAgricFarm</div>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <ul>

            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li>
                <a href="#" onclick="<?php if (!isset($_SESSION['username'])) {
                    echo 'showCustomAlert(\'Please log in first to access products.\'); return false;';
                } ?>">
                    <i class="fas fa-box"></i> Products
                </a>
            </li>

            <li><a href="#" id="login-link"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
    </nav>
    <!-- Overlay for login/signup form -->
    <div id="login-overlay" class="overlay">
        <div class="form-container">
            <button class="close-btn" onclick="closeLoginForm()">×</button>
            <h2 id="form-title">Login</h2>

            <!-- Login Form -->
            <form id="login-form" class="active-form" method="POST" action="login.php"
                onsubmit="return validateLoginForm()">
                <input type="text" id="login-username" name="username" placeholder="Username" required>
                <input type="password" id="login-password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <!-- Register Form -->
            <form id="register-form" method="POST" action="register.php" onsubmit="return validateRegisterForm()">
                <input type="text" id="register-username" name="username" placeholder="Username" required>
                <input type="email" id="register-email" name="email" placeholder="Email" required>
                <input type="text" id="register-phone" name="phone" placeholder="Phone Number" required>
                <input type="text" id="register-district" name="district" placeholder="District" required>
                <input type="password" id="register-password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>

            <div class="toggle-link">
                <p id="toggle-to-register">Don't have an account? <a href="#" onclick="toggleForms()">Register</a>
                </p>
                <p id="toggle-to-login" style="display:none;">Already have an account? <a href="#"
                        onclick="toggleForms()">Login</a></p>
            </div>
        </div>
    </div>
    <!-- Custom  Alert -->
    <div id="custom-alert" class="alert-overlay">
        <div class="alert-box">
            <p id="alert-message">This is your alert message!</p>
            <button class="alert-btn" onclick="closeCustomAlert()">OK</button>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to NanaAgricFarms</h1>
            <p>Where agriculture meets the environment. Let's go green together.</p>
            <button id="start">Get Started</button>
        </div>
    </div>

    <!-- Statistic Section -->
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
    <!-- Footer Section -->
    <?php
    include 'footer.php';
    ?>

    <!-- Java Script -->
    <script>
        // Show the custom alert
        function showCustomAlert(message) {
            const alertOverlay = document.getElementById('custom-alert');
            const alertMessage = document.getElementById('alert-message');
            alertMessage.textContent = message; // Set custom message
            alertOverlay.style.display = 'flex'; // Show the alert
        }

        // Close the custom alert
        function closeCustomAlert() {
            const alertOverlay = document.getElementById('custom-alert');
            alertOverlay.style.display = 'none'; // Hide the alert
        }
    </script>
    <script src="index.js"></script>
</body>

</html>