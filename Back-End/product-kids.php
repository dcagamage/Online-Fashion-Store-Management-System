<?php
$conn = new mysqli("localhost", "root", "", "pro1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM product1 WHERE Category IN ('Boy', 'Girl') AND Status = 'available'";
$result = $conn->query($sql);
$products=[
    'Boy' => [],
    'Girl' => []
];


if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $category = $product['Category']; // Directly use the Category column value
        if (in_array($category, ['Boy', 'Girl'])) {
            $products[$category][] = $product; // Add product to the corresponding category array
        }
    }
} else {
    // echo "No products found.";
}
?>

<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>
    
    <section id="kids">
        <div class="row mx-auto container">
            <nav aria-label="Page navigation example">
                    <h5 class="mt-5">Categories</h5>
                    <ul class="pagination">
                      <li class="page-item "><a class="page-link" href="product-women.php">Women</a></li>
                      <li class="page-item "><a class="page-link" href="product-men.php">Men</a></li>
                      <li class="page-item active"><a class="page-link" href="product-kids.php">Kids</a></li>
                      <li class="page-item"><a class="page-link" href="product-watch-collection.php">Accessories</a></li>
                    </ul>
            </nav>
            </div> 
        <div class="container py-5">
            <h2>Kids</h2>
            <p>Explore Vogue Vista’s vibrant collection of kids' clothing, designed for comfort and style. From playful outfits to everyday essentials, our kids' range features trendy and durable apparel for boys and girls. Discover everything from t-shirts, dresses, jeans, and more, perfect for keeping your little ones stylish and comfortable.</p>
        </div>
        <div class="row mx-auto container" style="justify-content: left !important;">

            <!--girls section-->

            <h3>GIRLS</h3>
            <hr>
            <?php foreach ($products['Girl'] as $product): ?>
				<div class="product text-center col-lg-3 col-md-4 col-12">
				<img class="img-fluid mb-3" src="data:image/jpeg;base64,<?= base64_encode($product['Image']); ?>" 
             alt="<?= htmlspecialchars($product['Name']); ?>">
					<h5 class="p-name"><?= htmlspecialchars($product['Name']); ?></h5>
					<h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="main_item.php?id=<?= urlencode($product['Id']); ?>">
                        <button class="buy-btn">View Product</button>
                    </a>
				</div>
			<?php endforeach; ?>

            <br><br>

            <!--boys section-->

            <h3>BOYS</h3>
            <hr>
            <?php foreach ($products['Boy'] as $product): ?>
				<div class="product text-center col-lg-3 col-md-4 col-12">
				<img class="img-fluid mb-3" src="data:image/jpeg;base64,<?= base64_encode($product['Image']); ?>" 
             alt="<?= htmlspecialchars($product['Name']); ?>">
					<h5 class="p-name"><?= htmlspecialchars($product['Name']); ?></h5>
					<h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="main_item.php?id=<?= urlencode($product['Id']); ?>">
                        <button class="buy-btn">View Product</button>
                    </a>
				</div>
			<?php endforeach; ?>

            <br><br>

            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5 pb-4">
                  <li class="page-item">
                    <a class="page-link" href="product-men.php" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item "><a class="page-link" href="product-women.php">1</a></li>
                  <li class="page-item "><a class="page-link" href="product-men.php">2</a></li>
                  <li class="page-item active"><a class="page-link" href="product-kids.php">3</a></li>
                  <li class="page-item"><a class="page-link" href="product-watch-collection.php">4</a></li>
                  <li class="page-item">
                    <a class="page-link" href="product-watch-collection.php" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>

       
    </section>
    
<?php
    include_once 'footer.php';
?>