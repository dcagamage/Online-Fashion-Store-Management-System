<?php
$conn = new mysqli('localhost', 'root', '', 'online_fashion_story_management_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // password encryption

// Insert new customer
$conn->query("INSERT INTO customer (Name, Email, Password) VALUES ('$name', '$email', '$password')");

// Get the new customer's ID
$customer_id = $conn->insert_id;

// Create a wishlist for the new customer
$conn->query("INSERT INTO wishlist (Customer_Id) VALUES ($customer_id)");

echo "Registration successful and wishlist created.";

$conn->close();
?>
