// Simulating a logged-in user (in a real app, this would be fetched from server/session)
const loggedInUser = {
    userId: "001",  // Example user ID for validation
    email: "john@example.com"  // Example email for validation
  };
  
  // Sample order data with different User IDs
  const orders = [
    { orderId: "#1001", date: "2024-04-01", status: "Delivered", amount: "Rs. 4500", userId: "001" },
    { orderId: "#1002", date: "2024-04-10", status: "Processing", amount: "Rs. 2800", userId: "002" },
    { orderId: "#1003", date: "2024-04-15", status: "Delivered", amount: "Rs. 3000", userId: "001" }
  ];
  
  // Function to toggle between profile and orders section
  function toggleSection(activeSection) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));
  
    // Show the active section
    document.getElementById(activeSection).classList.add('active');
  }
  
  // Function to load orders based on the User ID
  function loadOrders() {
    const ordersList = document.getElementById("ordersList");
    ordersList.innerHTML = "";  // Clear previous orders
  
    // Get the User ID from the profile form
    const userIdInput = document.getElementById("userId").value;
  
    // Validate if the User ID matches the logged-in user's ID
    if (userIdInput !== loggedInUser.userId) {
      ordersList.innerHTML = "<tr><td colspan='4' class='text-center text-danger'>Error: User ID does not match. Please check your profile.</td></tr>";
      return;
    }
  
    // Filter orders based on logged-in user (only show orders for the same User ID)
    const userOrders = orders.filter(order => order.userId === loggedInUser.userId);
  
    // If orders exist for the user, display them
    if (userOrders.length > 0) {
      userOrders.forEach(order => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${order.orderId}</td>
          <td>${order.date}</td>
          <td>${order.status}</td>
          <td>${order.amount}</td>
        `;
        ordersList.appendChild(row);
      });
    } else {
      // Display a message if no orders are found
      ordersList.innerHTML = "<tr><td colspan='4' class='text-center'>No orders found for this user.</td></tr>";
    }
  }
  
  // Event listeners for buttons
  document.getElementById("profileBtn").addEventListener("click", () => {
    toggleSection("profileSection");
    document.getElementById("profileBtn").classList.add("active");
    document.getElementById("ordersBtn").classList.remove("active");
  });
  
  document.getElementById("ordersBtn").addEventListener("click", () => {
    toggleSection("ordersSection");
    document.getElementById("ordersBtn").classList.add("active");
    document.getElementById("profileBtn").classList.remove("active");
    loadOrders();  // Load orders when "My Orders" is clicked
  });
  