const toggleBtn = document.querySelector('.toggle_btn');
const toggleBtnIcon = document.querySelector('.toggle_btn i');
const dropDownMenu = document.querySelector('.dropdown_menu');

toggleBtn.onclick = function(){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
}

const cartIcon = document.querySelector("#cart_icon");
const cart = document.querySelector(".cart");
const cartClose = document.querySelector(".close");
const cartContent = document.querySelector(".cart-content");
const totalPriceElement = document.querySelector(".total-price");
const cartItemCount = document.querySelector(".cart-item-count");

cartIcon.addEventListener("click", () => cart.classList.add("active"));
cartClose.addEventListener("click", () => cart.classList.remove("active"));

const addCartButtons = document.querySelectorAll(".add-cart");
addCartButtons.forEach(button => {
    button.addEventListener("click", event => {
        const productBox = event.target.closest(".product-box");
        addToCart(productBox);
    });
});

const addToCart = productBox => {
    const productImgSrc = productBox.querySelector("img").src;
    const productTitle = productBox.querySelector(".product-title").textContent;
    const productPrice = parseFloat(productBox.querySelector(".price").textContent.replace("Rs: ", "").replace("/=", ""));

    // Check if the item already exists in the cart
    const cartItems = cartContent.querySelectorAll(".cart-box");
    let itemExists = false;

    cartItems.forEach(item => {
        const existingTitle = item.querySelector(".cart-product-title").textContent;
        if (existingTitle === productTitle) {
            itemExists = true;
            // Update the quantity of the existing item
            const numberElement = item.querySelector(".number");
            let quantity = parseInt(numberElement.textContent);
            quantity++;
            numberElement.textContent = quantity;
            alert("Item already in cart. Quantity increased.");
            updateTotalPrice(); // Update total price
            updateCartCount(); // Update cart count
            return;
        }
    });

    // If the item does not exist, add it to the cart
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
            <img class="cart-remove" src="Products/delete.jpg.png" alt="" >
        `;

        cartContent.appendChild(cartBox);

        // Add event listener for remove button
        cartBox.querySelector(".cart-remove").addEventListener("click", () => {
            cartBox.remove();
            updateTotalPrice(); // Update total price after removing an item
            updateCartCount(); // Update cart count after removing an item
        });

        // Add event listeners for increment and decrement buttons
        const decrementButton = cartBox.querySelector(".decrement");
        const incrementButton = cartBox.querySelector(".increment");
        const numberElement = cartBox.querySelector(".number");

        decrementButton.addEventListener("click", () => {
            let quantity = parseInt(numberElement.textContent);
            if (quantity > 1) {
                quantity--;
                numberElement.textContent = quantity;
                if (quantity === 1) {
                    decrementButton.style.color = "#999";
                }
            }
            updateTotalPrice(); // Update total price after decrementing quantity
            updateCartCount(); // Update cart count after decrementing quantity
        });

        incrementButton.addEventListener("click", () => {
            let quantity = parseInt(numberElement.textContent);
            quantity++;
            numberElement.textContent = quantity;
            decrementButton.style.color = "#333";
            updateTotalPrice(); // Update total price after incrementing quantity
            updateCartCount(); // Update cart count after incrementing quantity
        });

        updateTotalPrice(); // Update total price after adding a new item
        updateCartCount(); // Update cart count after adding a new item
    }
};

// Function to update the total price
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

// Function to update the cart count
const updateCartCount = () => {
    const cartItems = cartContent.querySelectorAll(".cart-box");
    let totalCount = 0;

    cartItems.forEach(item => {
        const quantity = parseInt(item.querySelector(".number").textContent);
        totalCount += quantity;
    });

    cartItemCount.textContent = totalCount;
    cartItemCount.style.visibility = totalCount > 0 ? "visible" : "hidden"; // Show/hide the count
};