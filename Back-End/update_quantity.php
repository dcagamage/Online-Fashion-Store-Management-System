<?php
include 'db.php';
session_start();

$customer_id = $_SESSION['customer_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Get cart ID
$cart_sql = "SELECT Id FROM cart WHERE Customer_id = ?";
$cart_stmt = $conn->prepare($cart_sql);
$cart_stmt->bind_param("i", $customer_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
$cart = $cart_result->fetch_assoc();
$cart_id = $cart['Id'];

// Update the quantity of the product in cart_product
$update_sql = "UPDATE cart_product SET Quantity = ? WHERE Cart_id = ? AND Product_id = ?";
$update_stmt = $conn->prepare($update_sql);
$update_stmt->bind_param("iii", $quantity, $cart_id, $product_id);
$update_stmt->execute();

echo "Cart updated!";
$conn->close();
?>
