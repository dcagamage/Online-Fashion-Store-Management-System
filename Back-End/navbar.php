<!-- Navigation Bar -->
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/Vogue-Vista-Logo.jpg" alt="logo" class="logo_img">
                <a href="home.php">Vogue Vista</a>
            </div>
            <ul class="links">
                <li><a href="home.php">Home</a></li>
                <li><a href="product-women.php">Shop</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
            <div class="btn_container">
                <i class="fa-regular fa-heart heart-icon" id="wishlist"></i>
                <!-- <a href="#" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
                    </a> -->
                
                <div class="cart-container">
                    <i class="fa-solid fa-cart-shopping cart-icon"></i>
                    <span class="cart-item-count">0</span> 
                </div>


                <?php 
                    if(isset($_SESSION["useremail"])) {
                        // echo '<a href="#" class="action_btn">'.$_SESSION["username"].'</a>';
                        $userid = $_SESSION["userid"];
                        echo '<a href="Dashboards/UserManagement.html" class="action_btn">
                            <i class="fa-solid fa-circle-user user-icon"></i>'.$_SESSION["username"].'</a>';
                        echo '<a href="includes/logout.inc.php" class="action_btn">Logout</a>';
                        
                    } elseif (isset($_SESSION["adminemail"])) {
                        $adminid = $_SESSION["adminid"]; 
                        echo '<a href="dashboard-Admin.php" class="action_btn">
                            <i class="fa-solid fa-circle-user user-icon"></i>'.$_SESSION["adminname"].'</a>';
                        echo '<a href="includes/logout.inc.php" class="action_btn">Logout</a>';

                    } else {
                        echo '<a href="login.php" class="action_btn">Login</a>';
                        echo '<a href="register.php" class="action_btn">Register</a>';

                    }
                ?>
                
                <!-- <a href="login.html">
                    <i class="fa-regular fa-circle-user user-icon" href="Login-Register/login.html"></i>
                </a> -->
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="product-women.php">Shop</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <?php 
                    if(isset($_SESSION["username"])) {
                        // echo '<a href="#" class="action_btn">'.$_SESSION["username"].'</a>';
                        echo '<li><a href="Dashboards/UserManagement.html" class="action_btn">
                            '.$_SESSION["username"].'</a></li>';
                        echo '<li><a href="includes/logout.inc.php" class="action_btn">Logout</a></li>';

                    } elseif (isset($_SESSION["adminname"])) {
                        echo '<li><a href="dashboard-Admin.php" class="action_btn">
                            <i class="fa-solid fa-circle-user user-icon"></i>'.$_SESSION["adminname"].'</a></li>';
                        echo '<li><a href="includes/logout.inc.php" class="action_btn">Logout</a></li>';
                        
                    } else {
                        echo '<li><a href="login.php" class="action_btn">Login</a></li>';
                        echo '<li><a href="register.php" class="action_btn">Register</a></li>';

                    } 
                ?>
            
        </div>
    </header> 
	
	<!--backdrop-->
    <div class="backdrop"></div>

    <!-- Cart -->
    <div class="cart">
        <h2 class="cart-title">Cart</h2>
        <div class="cart-content">
        </div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rs: 0/=</div>
    
        </div>
        <form action="new_checkout.php" method="POST">
            <button class="btn-buy" type="submit" name="checkout">Buy Now</button>
        </form>

        <i class="fa-solid fa-xmark close"></i>
    </div>
    <!-- End of NavBar -->