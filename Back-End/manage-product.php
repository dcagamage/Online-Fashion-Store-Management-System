<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'online_fashion_store_management_system');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
  $productId = $conn->real_escape_string($_POST['product_id']);

  $sql = "DELETE FROM product WHERE PId = '$productId'";
  echo $conn->query($sql) === TRUE ? 'success' : 'error';
  $conn->close();
  exit();
}

$products = $conn->query("SELECT * FROM product");
?>

<?php
    include_once 'header.php';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>

<div class="container py-5">
  <h1 class="mb-4">📦 Product Management</h1>

  <a href="add-product.php" class="btn btn-primary mb-3">➕ Add New Product</a>

  <table class="table table-bordered">
    <caption>All Product Details</caption>
    <thead class="table-dark">
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price (Rs.)</th>
        <th>Image</th>
        <th>Status</th>
        <th>Admin ID</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="productTableBody">
      <?php if ($products->num_rows > 0): ?>
        <?php
          $products->data_seek(0);
          while ($row = $products->fetch_assoc()):
        ?>
          <tr data-product-id="<?= $row['Id'] ?>">
            <td><?= $row['Id'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td><?= $row['Price'] ?></td>
            <td><img src="data:image/jpeg;base64,<?= base64_encode($item['Image']); ?>" alt="Product Image" width="60" /></td>
            <td><?= $row['Status'] ?></td>
            <td><?= $row['Admin_id'] ?></td>
            <td><?= $row['Category'] ?></td>
            <td><?= $row['Stock'] ?></td>
            <td>
              <button class="btn btn-warning btn-sm">✏️ Edit</button>
              <button class="btn btn-danger btn-sm delete-btn">🗑️ Delete</button>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="9" class="text-center">No products found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <a href="dashboard-admin.php" class="btn btn-secondary mt-3">🔙 Back to Dashboard</a>
</div>

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
  button.addEventListener('click', function() {
    const row = this.closest('tr');
    const productId = row.getAttribute('data-product-id');

    if (confirm('Are you sure you want to delete this product?')) {
      fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'delete_product=1&product_id=' + productId
      })
      .then(response => response.text())
      .then(data => {
        if (data.trim() === 'success') {
          row.remove();
          alert('✅ Product Deleted Successfully!');
        } else {
          alert('❌ Error deleting product.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('❌ Server error.');
      });
    }
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
    include_once 'footer.php';
?>