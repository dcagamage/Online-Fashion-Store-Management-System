<?php
include_once 'header.php';
?>

<?php
require_once 'includes/dbh.inc.php';

// echo "Logged in as: " . ($_SESSION['userid'] ?? 'Not logged in');

$productId = isset($_GET['id']) ? $_GET['id'] : null;

if ($productId) {
    // Retrieve the product details using the product ID
    $sql = "SELECT * FROM product WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        // Handle case where no product is found
        echo "Product not found.";
        exit;
    }
} else {
    header("Location:./product-women.php");
    // echo "Invalid product.";
    exit;
}
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/main_item.css">
    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <script src="JS/main_item.js" defer></script>

<?php
include_once 'navbar.php';
?>

<!-- Product Details Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-end">
            <!-- Display the product image -->
            <img src="data:image/jpeg;base64,<?= base64_encode($product['Image']); ?>" class="img-fluid" alt="<?= htmlspecialchars($product['Name']); ?>" id="productImage">
        </div>
        <div class="col-md-6">
            <h2 id="productName"><?= htmlspecialchars($product['Name']); ?></h2>
            <p class="text-muted">Category: <?= htmlspecialchars($product['Category']); ?></p>
            <h4 id="productPrice">Rs. <?= number_format($product['Price'], 2, '.', '') ?></h4>
            <p id="productDescription"><?= htmlspecialchars($product['Product_detail']); ?></p>
            
            <form action="add-to-cart.php" method="post">
                <input type="hidden" name="product_id" value="<?= $product['Id']; ?>">
    
                <label for="quantity" class="form-label mt-2">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
    
                <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
            </form>

            <form action="add-to-wishlist.php" method="post">
                <input type="hidden" name="product_id" value="<?= $product['Id']; ?>">
    
                <button type="submit" class="btn btn-outline-danger mt-3">Add to Wishlist</button>
            </form>


        </div>
    </div>
</div><br>
<!--End of Product Details Section -->

<?php
include_once 'footer.php';
?>
