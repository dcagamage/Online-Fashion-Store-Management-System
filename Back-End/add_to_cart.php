<?php
include 'db.php';
session_start();

$customer_id = $_SESSION['customer_id']; // Get customer ID from session
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Get the cart ID for this customer
$cart_sql = "SELECT Id FROM cart WHERE Customer_id = ?";
$cart_stmt = $conn->prepare($cart_sql);
$cart_stmt->bind_param("i", $customer_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
$cart = $cart_result->fetch_assoc();
$cart_id = $cart['Id'];

// Check if the product is already in the cart
$check_sql = "SELECT * FROM cart_product WHERE Cart_id = ? AND Product_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ii", $cart_id, $product_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    // If it exists, update the quantity
    $update_sql = "UPDATE cart_product SET Quantity = Quantity + ? WHERE Cart_id = ? AND Product_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("iii", $quantity, $cart_id, $product_id);
    $update_stmt->execute();
} else {
    // If it doesn't exist, insert it
    $insert_sql = "INSERT INTO cart_product (Cart_id, Product_id, Quantity) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("iii", $cart_id, $product_id, $quantity);
    $insert_stmt->execute();
}

echo "Product added to cart!";
$conn->close();
?>
