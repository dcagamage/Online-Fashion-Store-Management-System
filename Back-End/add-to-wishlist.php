<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

$customerId = $_SESSION['userid'];
$productId = (int) $_POST['product_id'];

// Step 1: Get or create wishlist for user
$sql = "SELECT Id FROM wishlist WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $wishlistId = $row['Id'];
} else {
    $stmt = $conn->prepare("INSERT INTO wishlist (Customer_Id) VALUES (?)");
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $wishlistId = $stmt->insert_id;
}

// Step 2: Check if product already exists in wishlist
$sql = "SELECT * FROM wishlist_product WHERE Wishlist_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $wishlistId, $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Not in wishlist - insert new entry
    $sql = "INSERT INTO wishlist_product (Wishlist_id, Product_Id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $wishlistId, $productId);
    $stmt->execute();
}

// Redirect to wishlist
header("Location: wishlist.php");
exit;
