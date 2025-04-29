<?php
include 'db.php';
session_start();

$customer_id = $_SESSION['customer_id'];

$cart_sql = "SELECT Id FROM cart WHERE Customer_id = ?";
$cart_stmt = $conn->prepare($cart_sql);
$cart_stmt->bind_param("i", $customer_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
$cart = $cart_result->fetch_assoc();
$cart_id = $cart['Id'];

$product_id = $_POST['product_id']; // delete කරන්න ඕන product id එක

// cart_product එකෙන් delete කරන්න
$delete_sql = "DELETE FROM cart_product WHERE Cart_id = ? AND Product_id = ?";
$delete_stmt = $conn->prepare($delete_sql);
$delete_stmt->bind_param("ii", $cart_id, $product_id);
$delete_stmt->execute();

echo "Product removed from cart!";
$conn->close();
?>
