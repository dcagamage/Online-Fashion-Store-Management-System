const cartIcon = document.querySelector(".cart-container");
const cart = document.querySelector(".cart");
const cartClose = document.querySelector(".close");
const cartContent = document.querySelector(".cart-content");
const totalPriceElement = document.querySelector(".total-price");
const cartItemCount = document.querySelector(".cart-item-count");
const backdrop = document.querySelector(".backdrop");

// Open Cart
cartIcon.addEventListener("click", () => {
    cart.classList.add("active");
    backdrop.classList.add('show');
});

// Close Cart
cartClose.addEventListener("click", () => {
    cart.classList.remove("active");
    backdrop.classList.remove('show');
});

// Close Cart by clicking on backdrop
backdrop.addEventListener("click", () => {
    cart.classList.remove("active");
    backdrop.classList.remove('show');
});

// Add to Cart Buttons
const addCartButtons = document.querySelectorAll(".add-cart");
addCartButtons.forEach(button => {
    button.addEventListener("click", event => {
        const productBox = event.target.closest(".product-box");
        addToCart(productBox);
    });
});

// Add to Wishlist Buttons
const addWishlistButtons = document.querySelectorAll(".add-to-wishlist");
addWishlistButtons.forEach(button => {
    button.addEventListener("click", event => {
        const productBox = event.target.closest(".product-box");
        addToWishlist(productBox);
    });
});

// Add To Cart Function
const addToCart = (productBox) => {
    const productImgSrc = productBox.querySelector("img").src;
    const productTitle = productBox.querySelector(".product-title").textContent;
    const productPrice = parseFloat(productBox.querySelector(".price").textContent.replace("Rs: ", "").replace("/=", ""));
    const productId = productBox.getAttribute("data-product-id");

    const cartItems = cartContent.querySelectorAll(".cart-box");
    let itemExists = false;

    cartItems.forEach(item => {
        const existingTitle = item.querySelector(".cart-product-title").textContent;
        if (existingTitle === productTitle) {
            itemExists = true;
            const numberElement = item.querySelector(".number");
            let quantity = parseInt(numberElement.textContent);
            quantity++;
            numberElement.textContent = quantity;

            updateCartQuantity(productId, quantity);
            updateTotalPrice();
            updateCartCount();
            alert("Item already in cart. Quantity increased.");
            return;
        }
    });

    if (!itemExists) {
        const cartBox = document.createElement("div");
        cartBox.classList.add("cart-box");
        cartBox.innerHTML = `
            <img src="${productImgSrc}" class="cart-img">
            <div class="cart-detail">
                <h2 class="cart-product-title">${productTitle}</h2>
                <span class="cart-price">Rs: ${productPrice}/=</span>
                <div class="cart-quantity">
                    <button class="decrement">-</button>
                    <span class="number">1</span>
                    <button class="increment">+</button>
                </div>
            </div>
            <i class="fa-solid fa-trash cart-remove"></i>
        `;
        cartContent.appendChild(cartBox);

        addProductToCart(productId, 1);

        // Delete Button
        cartBox.querySelector(".cart-remove").addEventListener("click", () => {
            cartBox.remove();
            removeProductFromCart(productId);
            updateTotalPrice();
            updateCartCount();
        });

        // Increment and Decrement Buttons
        const decrementButton = cartBox.querySelector(".decrement");
        const incrementButton = cartBox.querySelector(".increment");
        const numberElement = cartBox.querySelector(".number");

        decrementButton.addEventListener("click", () => {
            let quantity = parseInt(numberElement.textContent);
            if (quantity > 1) {
                quantity--;
                numberElement.textContent = quantity;
                updateCartQuantity(productId, quantity);
                updateTotalPrice();
                updateCartCount();
            }
        });

        incrementButton.addEventListener("click", () => {
            let quantity = parseInt(numberElement.textContent);
            quantity++;
            numberElement.textContent = quantity;
            updateCartQuantity(productId, quantity);
            updateTotalPrice();
            updateCartCount();
        });

        updateTotalPrice();
        updateCartCount();
    }
};

// Add To Wishlist Function
const addToWishlist = (productBox) => {
    const productId = productBox.getAttribute("data-product-id");

    fetch('add_to_wishlist.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert(data); // Show message after adding to wishlist
    })
    .catch(error => console.error('Error:', error));
};

// Update total price
const updateTotalPrice = () => {
    const cartItems = cartContent.querySelectorAll(".cart-box");
    let totalPrice = 0;

    cartItems.forEach(item => {
        const price = parseFloat(item.querySelector(".cart-price").textContent.replace("Rs: ", "").replace("/=", ""));
        const quantity = parseInt(item.querySelector(".number").textContent);
        totalPrice += price * quantity;
    });

    totalPriceElement.textContent = `Rs: ${totalPrice}/=`;
};

// Update cart count
const updateCartCount = () => {
    const cartItems = cartContent.querySelectorAll(".cart-box");
    let totalCount = 0;

    cartItems.forEach(item => {
        const quantity = parseInt(item.querySelector(".number").textContent);
        totalCount += quantity;
    });

    cartItemCount.textContent = totalCount;
    cartItemCount.style.visibility = totalCount > 0 ? "visible" : "hidden";
};

// Add Product to Cart (AJAX to add_to_cart.php)
const addProductToCart = (productId, quantity) => {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
};

// Update Quantity (AJAX to update_quantity.php)
const updateCartQuantity = (productId, quantity) => {
    fetch('update_quantity.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
};

// Remove Product from Cart (AJAX to delete_from_cart.php)
const removeProductFromCart = (productId) => {
    fetch('delete_from_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
};
