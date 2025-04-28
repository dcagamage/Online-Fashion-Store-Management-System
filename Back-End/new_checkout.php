<?php
session_start();
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION["userid"];

$sql = "SELECT 
            p.Id AS ProductId, 
            p.Name AS ProductName, 
            p.Price AS ProductPrice, 
            p.Image AS ProductImage, 
            cp.Quantity AS ProductQuantity
        FROM cart_product cp
        INNER JOIN cart c ON c.Id = cp.Cart_id
        INNER JOIN product p ON p.Id = cp.Product_id
        WHERE c.Customer_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Store products in an array for later use
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
?>

<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <link rel="stylesheet" href="CSS/new_checkout.css">


<?php
    include_once 'navbar.php';
?>

<div class="container">
    <!-- Cart Section -->
    <div class="cart-section">
        <h2>Your Cart</h2>
        <br>
        <?php
            // Display the products using the stored array
            foreach ($products as $product) {
                $productName = $product['ProductName'];
                $productPrice = $product['ProductPrice'];
                $productQuantity = $product['ProductQuantity'];
                $totalPrice = $productPrice * $productQuantity;

                // Handle the image data (convert binary to base64)
                $productImage = $product['ProductImage'];
                $imageData = base64_encode($productImage);  // Convert binary to base64

                echo '
                <div class="cart-item">
                    <div class="item-details">
                            <img src="data:image/jpeg;base64,' . $imageData . '" alt="Product Image">
                        <div class="text-details">
                            <span>' . htmlspecialchars($productName) . '</span>
                            <small>(Rs. ' . htmlspecialchars($productPrice) . ' per product)</small>
                        </div>
                    </div>
                    <div class="item-meta">
                        <span>Qty: ' . htmlspecialchars($productQuantity) . '</span>
                        <span>Rs. ' . htmlspecialchars($totalPrice) . '</span>
                    </div>
                </div>
                
                ';
            }
            ?>
    </div>

    <!-- Order Details Section -->
    <div class="order-details-section">
        <h2>Order Details</h2>
        <form method="POST" action="process_order.php" autocomplete="off">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone_number" required>

            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required>

            <label for="address_type">Address Type</label>
            <select id="address_type" name="address_type" required>
                <option value="Home">Home</option>
                <option value="Office">Office</option>
            </select>

            <label for="payment_method">Payment Method</label>
            <select id="payment_method" name="payment_method" required>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="PayPal">PayPal</option>
            </select>

            <button type="submit">Complete Order</button>
        </form>
    </div>
</div>

<?php
    include_once 'footer.php';
?>
