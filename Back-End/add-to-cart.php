<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid'])) {

echo "Logged in as: " . ($_SESSION['userid'] ?? 'Not logged in');
    exit;
}

$customerId = $_SESSION['userid'];
$productId = (int) $_POST['product_id'];
$quantity = (int) $_POST['quantity'];

// Get or create cart for user
$sql = "SELECT Id FROM cart WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $cartId = $row['Id'];
} else {
    $stmt = $conn->prepare("INSERT INTO cart (Customer_Id) VALUES (?)");
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
    $newQty = $row['Quantity'] + $quantity;
    $sql = "UPDATE cart_product SET Quantity = ? WHERE Cart_id = ? AND Product_Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $newQty, $cartId, $productId);
    $stmt->execute();
} else {
    $sql = "INSERT INTO cart_product (Cart_id, Product_Id, Quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $cartId, $productId, $quantity);
    $stmt->execute();
}

header("Location: cart.php");
exit;
