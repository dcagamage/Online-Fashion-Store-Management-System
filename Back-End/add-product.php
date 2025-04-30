<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "online_fashion_store_management_system");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Initialize variables
$isEdit = isset($_GET['edit']);
$Id = $Name = $Price = $Category = $Image = $Stock = $Product_detail = $Status = $Admin_id = "";
$imagePath = "";

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST['Id'];
    $Admin_id = $_POST['Admin_id'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Product_detail = $_POST['Product_detail'];
    $Status = $_POST['Status'];
    $Category = trim($_POST['Category']);
    $Stock = $_POST['Stock'];

    // Handle image
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
        $imageName = basename($_FILES["Image"]["name"]);
        $targetDir = "uploads/";
        $imagePath = $targetDir . time() . "_" . $imageName;
        move_uploaded_file($_FILES["Image"]["tmp_name"], $imagePath);
    }

    // Check if product exists
    $check = $conn->prepare("SELECT Id FROM product WHERE Id = ?");
    $check->bind_param("s", $Id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Update
        $sql = "UPDATE product SET Admin_id=?, Name=?, Price=?, Product_detail=?, Status=?, Category=?, Stock=?";
        if ($imagePath) $sql .= ", Image=?";
        $sql .= " WHERE Id=?";

        if ($imagePath) {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsssiss", $Admin_id, $Name, $Price, $Product_detail, $Status, $Category, $Stock, $imagePath, $Id);
        } else {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsssis", $Admin_id, $Name, $Price, $Product_detail, $Status, $Category, $Stock, $Id);
        }

        $stmt->execute();
        $message = "✅ Product updated successfully!";
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO product (Id, Admin_id, Name, Price, Image, Product_detail, Status, Category, Stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdsssii", $Id, $Admin_id, $Name, $Price, $imagePath, $Product_detail, $Status, $Category, $Stock);
        $stmt->execute();
        $message = "✅ Product added successfully!";
    }

    echo "<div class='alert alert-success text-center'>$message</div>";
}

// Edit mode prefill
if ($isEdit && isset($_GET['Id'])) {
    $stmt = $conn->prepare("SELECT * FROM product WHERE Id = ?");
    $stmt->bind_param("s", $_GET['Id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $Id = $row['Id'];
        $Admin_id = $row['Admin_id'];
        $Name = $row['Name'];
        $Price = $row['Price'];
        $Status = $row['Status'];
        $Category = $row['Category'];
        $Stock = $row['Stock'];
        $Product_detail = $row['Product_detail'];
        $Image = $row['Image'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $isEdit ? 'Edit' : 'Add'; ?> Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4 text-center"><?php echo $isEdit ? '✏️ Edit Product' : '➕ Add New Product'; ?></h2>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Product ID</label>
      <input type="text" class="form-control" name="Id" required value="<?php echo htmlspecialchars($Id); ?>" <?php echo $isEdit ? 'readonly' : ''; ?>>
    </div>

    <div class="mb-3">
      <label class="form-label">Admin ID</label>
      <input type="text" class="form-control" name="Admin_id" required value="<?php echo htmlspecialchars($Admin_id); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Product Name</label>
      <input type="text" class="form-control" name="Name" required value="<?php echo htmlspecialchars($Name); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Price (Rs.)</label>
      <input type="number" class="form-control" name="Price" required value="<?php echo htmlspecialchars($Price); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <input type="file" class="form-control" name="Image" <?php echo $isEdit ? '' : 'required'; ?>>
      <?php if ($isEdit && $Image): ?>
        <p class="mt-2">Current Image: <img src="<?php echo htmlspecialchars($Image); ?>" height="80" alt="Product Image"></p>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label class="form-label">Details</label>
      <input type="text" class="form-control" name="Product_detail" required value="<?php echo htmlspecialchars($Product_detail); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Status</label>
      <select class="form-select" name="Status" required>
        <option value="In Stock" <?php if($Status == 'In Stock') echo 'selected'; ?>>In Stock</option>
        <option value="Out of Stock" <?php if($Status == 'Out of Stock') echo 'selected'; ?>>Out of Stock</option>
        <option value="Out of Stock" <?php if($Status == 'Out of Stock') echo 'selected'; ?>>Available</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <input type="text" class="form-control" name="Category" required value="<?php echo htmlspecialchars($Category); ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Stock Quantity</label>
      <input type="number" class="form-control" name="Stock" required value="<?php echo htmlspecialchars($Stock); ?>">
    </div>

    <button type="submit" class="btn btn-success"><?php echo $isEdit ? '💾 Save Changes' : '💾 Add Product'; ?></button>
    <a href="add-product.php" class="btn btn-secondary">🔄 Reset</a>
    <a href="manage-product.php" class="btn btn-secondary"> Back</a>
  </form>
</div>

</body>
</html>
