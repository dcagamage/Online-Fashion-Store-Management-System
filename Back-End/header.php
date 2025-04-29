<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    require_once 'includes/dbh.inc.php';
}
?>

<!-- display cart item count on the navbar  -->
<?php
$cartItemCount = 0;

if (isset($_SESSION["userid"])) {
    $userId = $_SESSION["userid"];

    $sql = "SELECT COUNT(*) AS itemCount 
            FROM cart_product cp
            INNER JOIN cart c ON c.Id = cp.Cart_id
            WHERE c.Customer_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $cartItemCount = $row['itemCount'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Vista | Online Fashion Store</title>
    <script src="https://kit.fontawesome.com/99536449b3.js" crossorigin="anonymous"></script>
    