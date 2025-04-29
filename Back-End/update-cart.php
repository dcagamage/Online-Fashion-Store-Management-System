<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid']) || !isset($_POST['product_id'], $_POST['quantity'])) {
    header("Location: cart.php");
    exit;
}

$customerId = $_SESSION['userid'];
$productId = (int) $_POST['product_id'];
$quantity = (int) $_POST['quantity'];

if ($quantity < 1) {
    header("Location: cart.php?error=Invalid quantity");
    exit;
}

// Get cart ID
$sql = "SELECT Id FROM cart WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$cartId = $row['Id'];

// Update quantity
$sql = "UPDATE cart_product SET Quantity = ? WHERE Cart_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $quantity, $cartId, $productId);
$stmt->execute();

header("Location: cart.php");
exit;
