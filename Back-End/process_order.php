<?php
session_start();
require_once 'includes/dbh.inc.php'; // Database connection

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $phone_number = trim($_POST['phone_number']);
    $address = trim($_POST['address']);
    $address_type = trim($_POST['address_type']);
    $payment_method = trim($_POST['payment_method']);

    $userId = $_SESSION["userid"];

    // Get Cart Id for the logged-in user
    $cartSql = "SELECT Id FROM cart WHERE Customer_id = ?";
    $cartStmt = mysqli_prepare($conn, $cartSql);
    mysqli_stmt_bind_param($cartStmt, "i", $userId);
    mysqli_stmt_execute($cartStmt);
    $cartResult = mysqli_stmt_get_result($cartStmt);
    $cartRow = mysqli_fetch_assoc($cartResult);

    if (!$cartRow) {
        die("Cart not found!");
    }

    $cartId = $cartRow['Id'];

    $ordered_date = date("Y-m-d");
    $ordered_time = date("H:i:s");
    $payment_status = "Pending";
    $status = "Processing";

    // Insert into order_table
    $insertSql = "INSERT INTO order_table 
    (Phone_number, Address, Address_type, Payment_method, Ordered_date, Ordered_time, Payment_status, Status, Cart_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $insertStmt = mysqli_prepare($conn, $insertSql);
    // if (!$insertStmt) {
    //     die("SQL error: " . mysqli_error($conn));
    // }
    
    mysqli_stmt_bind_param($insertStmt, "ssssssssi", 
        $phone_number, 
        $address, 
        $address_type, 
        $payment_method, 
        $ordered_date, 
        $ordered_time, 
        $payment_status, 
        $status, 
        $cartId
    );

    if (mysqli_stmt_execute($insertStmt)) {
        // Order inserted successfully
        header("Location: order_success.php"); // Redirect to a success page
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
