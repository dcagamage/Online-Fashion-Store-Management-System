<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <link rel="stylesheet" href="CSS/home.css">

<?php
    include_once 'navbar.php';
?>

<!-- 
<h1>Hello 
    <?php 
    if(isset($_SESSION["username"])) {
        echo $_SESSION["username"] . ' !'; 
    } else {
        echo 'user !';
    }
    ?>
</h1>
-->

	<!-- hero section -->
    <div class="hero">
		<div class="container">
        <div class="row">
            <div class="col-2">
                <h1>Elevate Your Style <br> Shop the Latest Trends!</h1>
                <p>Where elegance meets everyday wear – redefine your wardrobe with effortless style.</p>
                <!-- <a href="" class="btn">Explore Now &#8594;</a> -->
            </div>
            <div class="col-2">
                <img src="images/Vougue-Vista-Hero-Image.jpg" alt="hero-img">    
            </div>
        </div>
		</div>
    </div>

    <br>    
    <!-- categories -->
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="images/man-category.jpg" alt="">
                <a href="product-men.php" class="card-btn">Men</a>
            </div>
            <div class="col-4">
                <img src="images/woman-category.jpg" alt="">
                <a href="product-women.php" class="card-btn">Women</a>
            </div>
            <div class="col-4">
                <img src="images/kids-category.jpg" alt="">
                <a href="product-kids.php" class="card-btn">Kids</a>
            </div>
            <div class="col-4">
                <img src="images/accessories-category.jpg" alt="">
                <a href="product-watch-collection.php" class="card-btn">Accessories</a>
            </div>
        </div>
    </div>
    
    <!--featured products-->  
    <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row" style="align-items: center;">
        <?php
        include 'includes/dbh.inc.php';

        // Fetch 4 random products
        $query = "SELECT * FROM product ORDER BY RAND() LIMIT 4";
        $result = mysqli_query($conn, $query);

        // Loop through products
        while ($row = mysqli_fetch_assoc($result)) {
            $imageData = base64_encode($row['Image']);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
            ?>
            <div class="col-4">
                <img src="<?php echo $imageSrc; ?>" alt="<?php echo htmlspecialchars($row['Name']); ?>">
                <h4><?php echo $row['Name']; ?></h4>
                <p>Rs. <?php echo number_format($row['Price'], 2); ?></p>
            </div>
            <?php
            }
            ?>
            </div>
            
            <a href="product-women.php">
                <button class="show-more-btn">Show More...</button>
            </a>
            
    </div>

    <!--offer-->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/free_shipping.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Deals on Vogue Vista</p>
                    <h1>Enjoy Free Shipping on All Orders!</h1>
                    <small>Shop your favorite styles and get them delivered to your doorstep at no extra cost. 
                        Fashion made easier, just for you!</small>
                        <br>
                </div>
            </div>
        </div>
    </div>
    
    <!-- testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>"I’m so impressed with the variety and style choices! Every piece I’ve bought feels unique and high-quality. 
                        Plus, their website made shopping super easy and fun.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Dasith S.</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Stylish, trendy, and affordable – everything I want in a fashion store! 
                        My order arrived quickly, and the packaging was beautiful. I'll definitely be coming back for more.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Sashini A.</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Such a wonderful shopping experience! The clothes look even better in real life. 
                        Love how fresh and trendy everything feels!</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Nadeemal P.</h3>
                </div>
            </div>
        </div>
    </div>


<?php
    include_once 'footer.php';
?>