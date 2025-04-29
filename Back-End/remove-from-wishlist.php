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

// Delete from wishlist_product
$sql = "DELETE FROM wishlist_product WHERE Wishlist_id = ? AND Product_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $wishlistId, $productId);
$stmt->execute();

header("Location: wishlist.php");
exit;
