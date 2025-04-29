<?php
require_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM product WHERE Category IN ('Ladies', 'Gents') AND Status = 'available'";
$result = $conn->query($sql);
$products=[
    'Ladies' => [],
    'Gents' => []
];


if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $category = $product['Category']; 
        if (in_array($category, ['Ladies', 'Gents'])) {
            $products[$category][] = $product;
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
    
    <section id="watch">
        <div class="row mx-auto container">
            <nav aria-label="Page navigation example">
                <h5 class="mt-5">Categories</h5>
                <ul class="pagination ">
                  <li class="page-item "><a class="page-link" href="product-women.php">Women</a></li>
                  <li class="page-item "><a class="page-link" href="product-men.php">Men</a></li>
                  <li class="page-item"><a class="page-link" href="product-kids.php">Kids</a></li>
                  <li class="page-item active"><a class="page-link" href="product-watch-collection.php">Accessories</a></li>
                  
                </ul>
            </nav>
            </div> 
        <div class="container py-5">
            <h2>Watch Collection</h2>
            <p>Discover the latest fashion trends with Vogue Vista’s</p>
        <div class="row mx-auto container" style="justify-content: left !important;">

            <!--ladies watch section-->

            <h3>LADIES</h3>
            <hr>
            <?php foreach ($products['Ladies'] as $product): ?>
				<div class="product text-center col-lg-3 col-md-4 col-12">
				<img class="img-fluid mb-3" src="data:image/jpeg;base64,<?= base64_encode($product['Image']); ?>" 
             alt="<?= htmlspecialchars($product['Name']); ?>">
					<h5 class="p-name"><?= htmlspecialchars($product['Name']); ?></h5>
					<h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="accessories-item.php?id=<?= urlencode($product['Id']); ?>">
                        <button class="buy-btn">View Product</button>
                    </a>
				</div>
			<?php endforeach; ?>

            <br><br>
            

            <!--gents watch section-->
        
            <h3>GENTS</h3>
            <hr>
            <?php foreach ($products['Gents'] as $product): ?>
				<div class="product text-center col-lg-3 col-md-4 col-12">
				<img class="img-fluid mb-3" src="data:image/jpeg;base64,<?= base64_encode($product['Image']); ?>" 
             alt="<?= htmlspecialchars($product['Name']); ?>">
					<h5 class="p-name"><?= htmlspecialchars($product['Name']); ?></h5>
					<h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="accessories-item.php?id=<?= urlencode($product['Id']); ?>">
                        <button class="buy-btn">View Product</button>
                    </a>
				</div>
			<?php endforeach; ?>

            <br><br>

            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5 pb-4">
                  <li class="page-item">
                    <a class="page-link" href="product-kids.php" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item "><a class="page-link" href="product-women.php">1</a></li>
                  <li class="page-item "><a class="page-link" href="product-men.php">2</a></li>
                  <li class="page-item "><a class="page-link" href="product-kids.php">3</a></li>
                  <li class="page-item active"><a class="page-link" href="product-watch-collection.php">4</a></li>
                </ul>
              </nav>
        </div>

       
    </section>
    

<?php
    include_once 'footer.php';
?>