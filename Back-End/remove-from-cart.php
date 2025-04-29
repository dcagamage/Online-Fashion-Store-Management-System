<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid']) || !isset($_POST['product_id'])) {
    header("Location: cart.php");
    exit;
}

$customerId = $_SESSION['userid'];
$productId = (int) $_POST['product_id'];

// Get cart ID
$sql = "SELECT Id FROM cart WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$cartId = $row['Id'];

// Delete product from cart
$sql = "DELETE FROM cart_product WHERE Cart_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cartId, $productId);
$stmt->execute();

header("Location: cart.php");
exit;
