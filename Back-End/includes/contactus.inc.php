<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $messageContent = $_POST["message"];

    // Check if user is logged in
    if (isset($_SESSION["userid"])) {
        $customer_id = $_SESSION["userid"];
    } else {
        // If not logged in, redirect back with error
        header("location: ../contact-us.php?error=notloggedin");
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO message (Customer_id, Message_type, Message) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../contact-us.php?error=stmtfailed");
        exit();
    }

    // Set "Message_type" to something like 'General' or 'Inquiry'
    $messageType = "General"; 

    mysqli_stmt_bind_param($stmt, "iss", $customer_id, $messageType, $messageContent);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../contact-us.php?success=messagesent");
    exit();
} else {
    header("location: ../contact-us.php");
    exit();
}
?>
