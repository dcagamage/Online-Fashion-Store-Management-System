<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid']) || !isset($_POST['product_id'])) {
    header("Location: wishlist.php");
    exit;
}

$customerId = $_SESSION['userid'];
$productId = (int) $_POST['product_id'];

// Get wishlist ID
$sql = "SELECT Id FROM wishlist WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$wishlistId = $row['Id'] ?? null;

if (!$wishlistId) {
    header("Location: wishlist.php");
    exit;
}

// Get or create cart for user
$sql = "SELECT Id FROM cart WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$cartId = $row['Id'] ?? null;

if (!$cartId) {
    // Create cart if it doesn't exist
    $sql = "INSERT INTO cart (Customer_Id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $cartId = $stmt->insert_id;
}

// Check if product already in cart
$sql = "SELECT Quantity FROM cart_product WHERE Cart_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cartId, $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $quantity = $row['Quantity'] + 1;
    $sql = "UPDATE cart_product SET Quantity = ? WHERE Cart_id = ? AND Product_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $quantity, $cartId, $productId);
    $stmt->execute();
} else {
    $sql = "INSERT INTO cart_product (Cart_id, Product_Id, Quantity) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cartId, $productId);
    $stmt->execute();
}

// Remove from wishlist_product
$sql = "DELETE FROM wishlist_product WHERE Wishlist_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $wishlistId, $productId);
$stmt->execute();

header("Location: wishlist.php");
exit;
