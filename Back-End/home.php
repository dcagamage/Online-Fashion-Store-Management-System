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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!-- <a href="" class="btn">Explore Now &#8594;</a> -->
            </div>
            <div class="col-2">
                <img src="https://img.freepik.com/premium-vector/colorful-outline-icons-fashion-accessories_123891-90249.jpg?semt=ais_hybrid" alt="hero-img">    
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
            <div class="col-4">
                <!-- <img src="https://cynthiarenee.com/wp-content/uploads/2018/11/placeholder-product-image.png"> -->
                <img src="images/Product/36.jpg">
                <h4>Printed Top</h4>
                <p>Rs. 2500.00</p>
                <button class="add-cart-btn">Add to Cart</button>
            </div>
            <div class="col-4">
                <!-- <img src="https://cynthiarenee.com/wp-content/uploads/2018/11/placeholder-product-image.png"> -->
                <img src="images/Product/46.jpg">
                <h4>Long Sleeve Casual Shirt</h4>
                <p>Rs. 2000.00</p>
                <button class="add-cart-btn">Add to Cart</button>                
            </div>
            <div class="col-4">
                <!-- <img src="https://cynthiarenee.com/wp-content/uploads/2018/11/placeholder-product-image.png"> -->
                <img src="images/Product/56.jpg">
                <h4>Floral Casual Dress</h4>
                <p>Rs. 1500.00</p>
                <button class="add-cart-btn">Add to Cart</button>
            </div>
            <div class="col-4">
                <!-- <img src="https://cynthiarenee.com/wp-content/uploads/2018/11/placeholder-product-image.png"> -->
                <img src="images/Product/66.jpg">
                <h4>Graphic T-Shirt</h4>
                <p>Rs. 1000.00</p>
                <button class="add-cart-btn">Add to Cart</button>
            </div>
        </div>
    </div>

    <!--offer-->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="https://i.fbcd.co/products/resized/resized-750-500/art-19-997a06be01fe62beb494d27e44512c9a5ed537a136180cb38fa19ba3b3cd57bb.jpg" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Deals on Vogue Vista</p>
                    <h1>Up to 30% off</h1>
                    <small>Lorem ipsum dolor sit amet consectetur adipisicing 
                        elit. Facere assumenda doloribus perferendis nulla 
                        temporibus deserunt error velit aliquam.</small>
                        <br>
                    <a href="#" class="btn">Shop Now</a>
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
                    <p>Lorem ipsum dolor sit amet, consectetur 
                        adipisicing elit. Adipisci quaerat incidunt, 
                        deserunt laboriosam id similique.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Customer 1</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur 
                        adipisicing elit. Adipisci quaerat incidunt, 
                        deserunt laboriosam id similique.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Customer 2</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur 
                        adipisicing elit. Adipisci quaerat incidunt, 
                        deserunt laboriosam id similique.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="https://www.shutterstock.com/image-vector/avatar-photo-default-user-icon-600nw-2345549599.jpg">
                    <h3>Customer 3</h3>
                </div>
            </div>
        </div>
    </div>


<?php
    include_once 'footer.php';
?>