<?php
    include_once 'header.php';
?>

<?php
require_once 'includes/dbh.inc.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

$customerId = $_SESSION['userid'];

// Get cart ID for the user
$sql = "SELECT Id FROM cart WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $cartId = $row['Id'];
} else {
    echo "<p>Your cart is empty.</p>";
    exit;
}

// Fetch cart items
$sql = "SELECT cp.Product_Id, cp.Quantity, p.Name, p.Price, p.Image
        FROM cart_product cp
        JOIN product p ON cp.Product_Id = p.Id
        WHERE cp.Cart_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cartId);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>
    
    <div class="container mt-5 mb-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="card-title mb-4 text-primary border-bottom pb-2">🛒 Your Shopping Cart</h2>

            <?php if ($result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table align-middle table-hover text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th>Price (Rs.)</th>
                            <th>Quantity</th>
                            <th>Subtotal (Rs.)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $result->fetch_assoc()): 
                            $subtotal = $item['Price'] * $item['Quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($item['Name']); ?></td>
                            <td><img src="data:image/jpeg;base64,<?= base64_encode($item['Image']); ?>" class="img-thumbnail" style="width: 70px;"></td>
                            <td><?= number_format($item['Price'], 2); ?></td>
                            <td>
                                <form action="update-cart.php" method="post" class="d-flex justify-content-center align-items-center gap-2">
                                    <input type="hidden" name="product_id" value="<?= $item['Product_Id']; ?>">
                                    <input type="number" name="quantity" value="<?= $item['Quantity']; ?>" min="1" class="form-control w-50">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                </form>
                            </td>
                            <td><?= number_format($subtotal, 2); ?></td>
                            <td>
                                <form action="remove-from-cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['Product_Id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <tr class="table-info">
                            <td colspan="4" class="text-end"><strong>Total:</strong></td>
                            <td colspan="2"><strong>Rs. <?= number_format($total, 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <form action="new_checkout.php" method="post">
                    <button type="submit" class="btn btn-lg btn-success px-4">Proceed to Checkout</button>
                </form>
            </div>
            <?php else: ?>
                <div class="alert alert-warning mt-4" role="alert">
                    Your cart is empty. <a href="product-women.php" class="alert-link">Browse products</a>.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php
    include_once 'footer.php';
?>
