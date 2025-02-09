<?php
$user = 'root';
$password = '';
$db = 'farm';
$host = 'localhost';

// Establish connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // For debugging, you can log successful connection
    // echo "Connected successfully";
}
?>