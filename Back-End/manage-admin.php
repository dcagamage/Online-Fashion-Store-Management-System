<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_fashion_store_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read all admins
$sql = "SELECT * FROM admin_details";
$result = $conn->query($sql);

// ✅ Delete functionality
if (isset($_GET['delete'])) {
  $deleteID = $_GET['delete'];
  $sqlDelete = "DELETE FROM admin_details WHERE admin_id='$deleteID'";
  if ($conn->query($sqlDelete) === TRUE) {
      header("Location: manage-admin.php?deleted=1");
      exit();
  } else {
      echo "Error deleting admin: " . $conn->error;
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <title>Manage Admins</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleManageA.css"> 
</head>
<body>

<div class="container py-5">
  <h1 class="mb-4">👨‍💼 Manage Admins</h1>
  <?php 
// if (isset($_GET['success']) && $_GET['success'] == 1):
//     echo '<div class="alert alert-success">✅ Admin saved successfully!</div>';
// endif;
?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="alert alert-success">✅ Admin saved successfully!</div>
<?php elseif (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
  <div class="alert alert-success">✅ Admin changed successfully!</div>
<?php elseif (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
  <div class="alert alert-success">🗑️ Admin deleted successfully!</div>
<?php endif; ?>



  <div class="mb-3">
    <a href="add-admin.php" class="btn btn-primary">➕ Add New Admin</a>
  </div>

  <table class="table table-hover">
    <thead class="table-dark">
      <tr>
        <th>Admin ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th> <!-- Keeping the Actions column if you had it -->
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['admin_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="add-admin.php?edit=<?= urlencode($row['admin_id']) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                <a href="manage-admin.php?delete=<?= urlencode($row['admin_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this admin?')">🗑️ Delete</a>
          </td>

          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4">No admins found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>


<a href="dashboard-admin.php" class="btn btn-danger">Back to Admin Dashboard</a>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>

<?php
$conn->close();
?>
