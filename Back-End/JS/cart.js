document.addEventListener("DOMContentLoaded", () => {
    // Variables
    const cartIcon = document.querySelector(".cart-container");
    const cart = document.querySelector(".cart");
    const cartClose = document.querySelector(".close");
    const cartContent = document.querySelector(".cart-content");
    const totalPriceElement = document.querySelector(".total-price");
    const cartItemCount = document.querySelector(".cart-item-count");
	const backdrop = document.querySelector(".backdrop");

    // Show/Hide Cart
    cartIcon.addEventListener("click", () => {
		cart.classList.add("active");
		backdrop.classList.add('show'); // Show backdrop when opening cart
	});
    cartClose.addEventListener("click", () => {
		cart.classList.remove("active");
		backdrop.classList.remove('show'); // Hide backdrop when closing cart
	});
	backdrop.addEventListener("click", () => {
		cart.classList.remove("active");
		backdrop.classList.remove('show');
	});

    // Add to Cart buttons (for product boxes)
    const addCartButtons = document.querySelectorAll(".add-cart");
    addCartButtons.forEach(button => {
        button.addEventListener("click", event => {
            const productBox = event.target.closest(".product-box");
            addProductBoxToCart(productBox);
        });
    });

    // Add to Cart from Product Detail Page
    window.addToCart = function() {
        const productName = document.getElementById("productName").textContent;
        const productPriceText = document.getElementById("productPrice").textContent;
        const productPrice = parseFloat(productPriceText.replace("Rs.", "").replace("/=", "").trim());
        const productSize = document.getElementById("size").value;
        const quantity = parseInt(document.getElementById("quantity").value);

        const productImgElement = document.getElementById("productImage");
        const productImgSrc = productImgElement ? productImgElement.src : "Add-to-Cart/default-product.jpg"; 

        addProductToCart(productName, productPrice, productImgSrc, quantity, productSize);
        alert(`Added ${quantity} item(s) of size ${productSize} to cart!`);
    };

    // Add to Wishlist
    window.addToWishlist = function() {
        alert("Added to Wishlist!");
    };

    // Function for adding from product-box
    const addProductBoxToCart = (productBox) => {
        const productImgSrc = productBox.querySelector("img").src;
        const productTitle = productBox.querySelector(".product-title").textContent;
        const productPrice = parseFloat(productBox.querySelector(".price").textContent.replace("Rs: ", "").replace("/=", ""));
        const quantity = 1;
        const size = ""; // No size in product boxes

        addProductToCart(productTitle, productPrice, productImgSrc, quantity, size);
    };

    // Main Add Product to Cart function
    const addProductToCart = (productName, productPrice, productImgSrc, quantity, size) => {
        const cartItems = cartContent.querySelectorAll(".cart-box");
        let itemExists = false;

        cartItems.forEach(item => {
            const existingName = item.querySelector(".cart-product-name").textContent.trim();
			const existingSize = item.querySelector(".cart-product-size").textContent.replace("size: ", "").trim();

			if (existingName === productName && existingSize === size) {
			itemExists = true;
			const numberElement = item.querySelector(".number");
		    let currentQuantity = parseInt(numberElement.textContent);
		    currentQuantity += quantity;
    		numberElement.textContent = currentQuantity;
    		alert("Item already in cart. Quantity updated.");
    		updateTotalPrice();
    		updateCartCount();
    		return;
		}

        });

        if (!itemExists) {
            const cartBox = document.createElement("div");
            cartBox.classList.add("cart-box");
            cartBox.innerHTML = `
                <img src="${productImgSrc}" class="cart-img">
                <div class="cart-detail">
                    <h2 class="cart-product-title">
						<span class="cart-product-name">${productName}</span><br>
						<span class="cart-product-size">size: ${size}</span>
					</h2>

                    <span class="cart-price">Rs: ${productPrice}/=</span>
                    <div class="cart-quantity">
                        <button class="decrement">-</button>
                        <span class="number">${quantity}</span>
                        <button class="increment">+</button>
                    </div>
                </div>
                <i class="fa-solid fa-trash cart-remove"></i>
            `;

            cartContent.appendChild(cartBox);

            // Remove button
            cartBox.querySelector(".cart-remove").addEventListener("click", () => {
                cartBox.remove();
                updateTotalPrice();
                updateCartCount();
            });

            // Increment/Decrement buttons
            const decrementButton = cartBox.querySelector(".decrement");
            const incrementButton = cartBox.querySelector(".increment");
            const numberElement = cartBox.querySelector(".number");

            decrementButton.addEventListener("click", () => {
                let qty = parseInt(numberElement.textContent);
                if (qty > 1) {
                    qty--;
                    numberElement.textContent = qty;
                    if (qty === 1) {
                        decrementButton.style.color = "#999";
                    }
                }
                updateTotalPrice();
                updateCartCount();
            });

            incrementButton.addEventListener("click", () => {
                let qty = parseInt(numberElement.textContent);
                qty++;
                numberElement.textContent = qty;
                decrementButton.style.color = "#333";
                updateTotalPrice();
                updateCartCount();
            });

            updateTotalPrice();
            updateCartCount();
        }
    };

    // Update Total Price
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

    // Update Cart Item Count
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
});
