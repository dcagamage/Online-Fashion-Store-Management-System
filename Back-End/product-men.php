<?php
require_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM product WHERE Category IN ('Pants', 'Shirt', 'T-Shirt') AND Status = 'available'";
$result = $conn->query($sql);
$products=[
    'Pants' => [],
    'Shirt' => [],
    'T-Shirt' => []
];


if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $category = $product['Category']; // Directly use the Category column value
        if (in_array($category, ['Pants', 'Shirt', 'T-Shirt'])) {
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
    
    <section id="men">
        <div class="row mx-auto container">
        <nav aria-label="Page navigation example">
            <h5 class="mt-5">Categories</h5>
            <ul class="pagination pb-4">
              <li class="page-item "><a class="page-link" href="product-women.php">Women</a></li>
              <li class="page-item active"><a class="page-link" href="product-men.php">Men</a></li>
              <li class="page-item"><a class="page-link" href="product-kids.php">Kids</a></li>
              <li class="page-item"><a class="page-link" href="product-watch-collection.php">Accessories</a></li>
            </ul>
        </nav>
        </div> 

        <div class="container py-2">
            <h2>Mens</h2>
            <p>Explore the latest trends in men’s fashion at Vogue Vista. From casual wear to formal wear, our men’s clothing collection offers something for every occasion.
                 Shop trendy accessories, innerwear, sportwear, and more. Discover quality fashion at unbeatable prices.</p>
        </div>
        <div class="row mx-auto container" style="justify-content: left !important;">

            <!--pants section-->

            <h3>PANTS</h3>
            <hr>
            <?php foreach ($products['Pants'] as $product): ?>
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

            <!--shirts section-->

            <h3>SHIRTS</h3>
            <hr>
            <?php foreach ($products['Shirt'] as $product): ?>
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

            <!--t-Shirt section-->

            <h3>T-SHIRTS</h3>
            <hr>
            <?php foreach ($products['T-Shirt'] as $product): ?>
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
                    <a class="page-link" href="product-women.php" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item "><a class="page-link" href="product-women.php">1</a></li>
                  <li class="page-item active"><a class="page-link" href="product-men.php">2</a></li>
                  <li class="page-item"><a class="page-link" href="product-kids.php">3</a></li>

                  <li class="page-item"><a class="page-link" href="product-watch-collection.php">4</a></li>
                  <li class="page-item">
                    <a class="page-link" href="product-kids.php" aria-label="Next">
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