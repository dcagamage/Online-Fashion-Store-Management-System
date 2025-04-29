<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

$customerId = $_SESSION['userid'];

// Get wishlist ID
$sql = "SELECT Id FROM wishlist WHERE Customer_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$wishlistId = $row['Id'] ?? null;

$items = [];

if ($wishlistId) {
    // Fetch wishlist items
    $sql = "SELECT p.Id AS Product_Id, p.Name, p.Price, p.Image
            FROM wishlist_product wp
            JOIN product p ON wp.Product_Id = p.Id
            WHERE wp.Wishlist_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $wishlistId);
    $stmt->execute();
    $items = $stmt->get_result();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/navbar-footer.css">

<?php include_once 'navbar.php'; ?>

<div class="container mt-5 mb-5">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="card-title mb-4 text-primary border-bottom pb-2">💖 Your Wishlist</h2>

            <?php if (!empty($items) && $items->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table align-middle table-hover text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price (Rs.)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = $items->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['Name']); ?></td>
                            <td><img src="data:image/jpeg;base64,<?= base64_encode($item['Image']); ?>" class="img-thumbnail" style="width: 70px;"></td>
                            <td><?= number_format($item['Price'], 2); ?></td>
                            <td class="d-flex justify-content-center gap-2">
                                <form action="move-to-cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['Product_Id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Add to Cart</button>
                                </form>
                                <form action="remove-from-wishlist.php" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['Product_Id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-info mt-4" role="alert">
                    Your wishlist is empty. <a href="product-women.php" class="alert-link">Browse products!</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
