<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    echo "Please login first.";
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'online_fashion_story_management_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customer_id = $_SESSION['customer_id'];
$product_id = intval($_POST['product_id']);

// Get wishlist id
$result = $conn->query("SELECT Id FROM wishlist WHERE Customer_Id = $customer_id LIMIT 1");

if ($result->num_rows > 0) {
    $wishlist = $result->fetch_assoc();
    $wishlist_id = $wishlist['Id'];

    // Delete from wishlist_product
    $conn->query("DELETE FROM wishlist_product WHERE Wishlist_id = $wishlist_id AND Product_id = $product_id");

    echo "Product removed from wishlist.";
} else {
    echo "Wishlist not found.";
}

$conn->close();
?>
