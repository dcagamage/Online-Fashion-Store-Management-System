<?php
$conn = new mysqli("localhost", "root", "", "vogue_vista1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM product1 WHERE Category IN ('Dress', 'Trouser', 'Blouse') AND Status = 'available'";
$result = $conn->query($sql);
$products=[
    'Dress' => [],
    'Trouser' => [],
    'Blouse' => []
];


if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $category = $product['Category']; // Directly use the Category column value
        if (in_array($category, ['Dress', 'Trouser', 'Blouse'])) {
            $products[$category][] = $product; // Add product to the corresponding category array
        }
    }
} else {
    echo "No products found.";
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Vista | Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/navbar-footer.css">
    
</head>

<body>

    <!-- Navigation Bar -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="https://t3.ftcdn.net/jpg/03/24/75/46/360_F_324754632_LRC1yH2prRSccyk3gyEF3W8ptZxSElCP.jpg" alt="logo" class="logo_img">
                <a href="#">Vogue Vista</a>
            </div>
            <ul class="links">
                <li><a href="home.html">Home</a></li>
                <li><a href="product-women.php">Shop</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
            <div class="btn_container">
                <i class="fa-solid fa-cart-shopping cart-icon"></i>
                <i class="fa-regular fa-heart heart-icon" id="wishlist"></i>
                <a href="login.html" class="action_btn">Login</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="home.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="contact-us.html">Contact</a></li>
            <li><a href="login.html" class="action_btn">Login</a></li>
        </div>
    </header> 
    <!-- End of NavBar -->

      <div class="container mt-5 py-1">
            <h1>Our Products</h1>
            <hr>
            <p>Here you can check out our new products with fair price on vogue vista.</p>
        </div>
    
    <section id="women">
        <div class="row mx-auto container">
        <nav aria-label="Page navigation example">
                <h5 class="mt-3">Categories</h5>
                <ul class="pagination">
                  <li class="page-item active"><a class="page-link" href="product-women.php">Women</a></li>
                  <li class="page-item "><a class="page-link" href="product-men.php">Men</a></li>
                  <li class="page-item"><a class="page-link" href="product-kids.php">Kids</a></li>
                  <li class="page-item"><a class="page-link" href="product-watch-collection.php">Accessories</a></li>
                </ul>
        </nav>
        </div> 
        <div class="container py-5">
            <h2>Womens</h2>
            <p>Explore Vogue Vista’s extensive collection of women’s clothing and accessories. From elegant dresses to casual wear and everything in between, find stylish and high-quality pieces to enhance your wardrobe.</p>
        </div>

        <!--dress section-->
        
        <div class="row mx-auto container">
            <h3>DRESS</h3>
            <hr>
            
            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/30.jpg">
                <h5 class="p-name">Sleeveless Dress</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/31.jpg">
                <h5 class="p-name">Batik Dress</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/40.jpg">
                <h5 class="p-name">Long Floral Dress</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/41.jpg">
                <h5 class="p-name">Short Dress</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>
        </div>
        
        <div class="row mx-auto container" style="justify-content: left !important;">
            <?php foreach ($products['Dress'] as $product): ?>
                <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>">
                    <h5 class="p-name"><?= $product['Name'] ?></h5>
                    <h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="main_item.html">
                        <button class="buy-btn">View Product</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

            <!--trousers section-->

        
        <div class="row mx-auto container">
            <h3>TROUSERS</h3>
            <hr>
            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/33.jpg">
                <h5 class="p-name">Cotton Trouser</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/32.jpg">
                <h5 class="p-name">Cotton Trouse</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/34.jpg">
                <h5 class="p-name">Office Trouser</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/35.jpg">
                <h5 class="p-name">Office Trouser</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>
        </div>
        <div class="row mx-auto container" style="justify-content: left !important;">
            <?php foreach ($products['Trouser'] as $product): ?>
                <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>">
                    <h5 class="p-name"><?= $product['Name'] ?></h5>
                    <h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="main_item.html">
                        <button class="buy-btn">View Product</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
            

<!--blouse section-->
       
        <div class="row mx-auto container">
            <h3>BLOUSE</h3>
            <hr>
            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/36.jpg">
                <h5 class="p-name">Printed Top</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/37.jpg">
                <h5 class="p-name">Ladies Top</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/38.jpg">
                <h5 class="p-name">Ladies Top</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>

            <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="images/Product/39.jpg">
                <h5 class="p-name">Long Sleeve Shirt</h5>
                <h6 class="p-price">Rs. 2,000.00</h6>
                <a href="main_item.html">
                    <button class="buy-btn">View Product</button>
                </a>
            </div>
        
        <div class="row mx-auto container" style="justify-content: left !important;">
            <?php foreach ($products['Blouse'] as $product): ?>
                <div class="product text-center col-lg-3 col-md-6 col-12">
                <img class="img-fluid mb-3" src="<?= $product['Image']; ?>" alt="<?= $product['Name']; ?>">
                    <h5 class="p-name"><?= $product['Name'] ?></h5>
                    <h6 class="p-price">Rs. <?= number_format($product['Price'], 2) ?></h6>
                    <a href="main_item.html">
                        <button class="buy-btn">View Product</button>
                     </a>
                </div>
            <?php endforeach; ?>
        </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5 pb-4">
                  <li class="page-item active"><a class="page-link" href="product-women.php">1</a></li>
                  <li class="page-item"><a class="page-link" href="product-men.php">2</a></li>
                  <li class="page-item"><a class="page-link" href="product-kids.php">3</a></li>
                  <li class="page-item"><a class="page-link" href="product-watch-collection.php">4</a></li>
                  <li class="page-item">
                    <a class="page-link" href="product-men.php" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>

       
    </section>
    
    

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="footer-col company-info">
                <img src="https://t3.ftcdn.net/jpg/03/24/75/46/360_F_324754632_LRC1yH2prRSccyk3gyEF3W8ptZxSElCP.jpg"
                 alt="Company Logo" class="company-logo">
                <div class="company-text">
                    <h3>Vogue Vista</h3>
                    <p>"Lorem ipsum dolor sit amet"</p>
                </div>
            </div>
            <div class="footer-col about">
                <h3>About Us</h3>
                <p class="about">Lorem, ipsum dolor sit amet illo tio consectetur adipisicing elit. 
                    Dolore illo recusandae assumenda lorem ipsum dolor sit amet.</p>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact Info:</h3>
                <ul>
                    <li><a href="">Phone: (+94) 777022022</a></li>
                    <li><a href="">E-mail: voguevista@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="socials">
            <h3>Follow Us</h3>
            <ul class="social_icon">
                <li><a href=""><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
        </div>
        <div class="copyright">
            <hr>
            <p>© 2025 Vogue Vista | All Rights Reserved</p>  
        </div>
    </footer>
    <!-- end of footer -->
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>