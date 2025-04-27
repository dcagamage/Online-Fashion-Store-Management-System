<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
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
            <div class="col-md-6">
                <img src="images\boys_T-shirt.jpg" class="img-fluid" alt="Product Image" id="productImage">
            </div>
            <div class="col-md-6">
                <h2 id="productName">Product Name</h2>
                <p class="text-muted" >Category:Men's Fashion</p>
				
                <h4 id="productPrice">Rs. 3000.00/=</h4>
                <p id="productDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
                
                <label for="size" class="form-label">Select Size:</label>
                <select id="size" class="form-select">
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
                
                <label for="quantity" class="form-label mt-2">Quantity:</label>
                <input type="number" id="quantity" class="form-control" value="1" min="1">
                
                <button class="btn btn-primary mt-3" onclick="addToCart()">Add to Cart</button>
                <button class="btn btn-outline-danger mt-3" onclick="addToWishlist()"> Wishlist</button>
                

            </div>
        </div>
    </div><br>
    <!--End of Product Details Section -->
    
<?php
    include_once 'footer.php';
?>