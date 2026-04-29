<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "harvesthub");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $loyalty_code = $_POST['loyalty_code'];

    // Insert data into the loyalty_users table
    $sql = "INSERT INTO loyalty_users (full_name, email, phone, address, loyalty_code) 
            VALUES ('$full_name', '$email', '$phone', '$address', '$loyalty_code')";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully registered for the Loyalty Program!";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
