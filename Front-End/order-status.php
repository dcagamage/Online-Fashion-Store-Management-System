<?php
$host = "localhost";
$username = "root"; 
$password = "";     
$dbname = "vogue_vista1";

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderData = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $conn->real_escape_string($_POST['customer_id']);

    $result = $conn->query("SELECT * FROM orders1 WHERE customer_id = '$customerId'");
    
    if ($result && $result->num_rows > 0) {
        $orderData = [];
        while ($row = $result->fetch_assoc()) {
            $orderData[] = $row;
        }
    } else {
        $error = "No order found for the given Customer ID.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vogue Vista | Online Fashion Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="navbar-footer.css">
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
                <li><a href="product-women.html">Shop</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="btn_container">
                <i class="fa-solid fa-cart-shopping cart-icon"></i>
                <i class="fa-regular fa-heart heart-icon" id="wishlist"></i>
                <a href="Login-Register/login.html" class="action_btn">Login</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="home.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="" class="action_btn">Login</a></li>
        </div>
    </header> 
    <!-- End of NavBar -->
    <!-- customer_id -->
    <h2>Track Your Order</h2>
    <div class="order-wrapper animate-fade">
    <div class="container">
    
    <form method="POST">
        <input 
            type="text" 
            name="customer_id" 
            placeholder="Enter your Customer ID" 
            class="input-small" 
            autocomplete="off"
            required
        />

        <button type="submit" class="check-btn-small"><i class="fa-solid fa-magnifying-glass"></i> Check Status</button>

    </form>
    <br>
    <?php if ($orderData): ?>
    <?php foreach ($orderData as $data): ?>
        <hr>
        <div class="order-details-step">
            <h3><i class="fa-solid fa-receipt"></i> Order ID: <?= htmlspecialchars($data['customer_id']) ?></h3>

            <div class="step-section">
                <h4><i class="fa-solid fa-user"></i> Customer Details</h4>
                <p><strong>Phone Number:</strong> <?= htmlspecialchars($data['phone_number']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-location-dot"></i> Delivery Address</h4>
                <p><strong>Address:</strong> <?= htmlspecialchars($data['address']) ?></p>
                <p><strong>Type:</strong> <?= htmlspecialchars($data['address_type']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-money-bill-wave"></i> Payment Info</h4>
                <p><strong>Method:</strong> <?= htmlspecialchars($data['payment_method']) ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($data['payment_status']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-box"></i> Product Info</h4>
                <p><strong>Product:</strong> <?= htmlspecialchars($data['product_name']) ?></p>
                <p><strong>Cart ID:</strong> <?= htmlspecialchars($data['cart_id']) ?></p>
                <p><strong>Ordered Date:</strong> <?= htmlspecialchars($data['ordered_date']) ?></p>
                <p><strong>Ordered Time:</strong> <?= htmlspecialchars($data['ordered_time']) ?></p>
                <img src="<?= htmlspecialchars($data['product_image']) ?>" width="100" alt="Product Image">
            </div>

            <div class="step-section">
                <h4>Status:</h4>
                <div class="status-tracker">
                    <?php
                    $steps = [
                        'Ordered' => '🛒',
                        'Packed' => '📦',
                        'Shipped' => '🚚',
                        'Out for Delivery' => '📍',
                        'Delivered' => '✅'
                    ];
                    $statusReached = true;
                    foreach ($steps as $step => $icon) {
                        $active = $statusReached ? 'step-box active' : 'step-box';
                        echo "<div class='$active'><div class='icon'>$icon</div><div class='label'>$step</div></div>";
                        if ($step === $data['status']) $statusReached = false;
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php elseif ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

</div>
</div>

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
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>
