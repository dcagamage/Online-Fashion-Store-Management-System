<?php
$updateMsg = "";
$name = $email = $password = "";
$userId = "";

// Handle data fetching when searching
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['searchUser'])) {
  $userId = $_POST["userId"];

  $conn = new mysqli("localhost", "root", "", "online_fashion_store_management_system");
  if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

  $sql = "SELECT Name, Email, Password FROM customer WHERE Id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $userId);
  $stmt->execute();
  $stmt->bind_result($name, $email, $password);
  $stmt->fetch();
  $stmt->close();
  $conn->close();
}

// Handle update when saving changes
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['saveChanges'])) {
  $userId = $_POST["Id"];
  $name = $_POST["Name"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];

  $conn = new mysqli("localhost", "root", "", "online_fashion_store_management");
  if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

  $sql = "UPDATE customer SET Name=?, Email=?, Password=? WHERE Id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $name, $email, $password, $userId);

  if ($stmt->execute()) {
    $updateMsg = "✅ Profile updated successfully!";
  } else {
    $updateMsg = "❌ Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>

<?php
    include_once 'header.php';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>
  
</head>
<body>
<div class="container py-5">
  <h2 class="text-center mb-4">👤 Manage User Profile</h2>

  <?php if ($updateMsg): ?>
    <div class="alert alert-info text-center"><?php echo $updateMsg; ?></div>
  <?php endif; ?>

  <form method="POST" id="userForm">
    <div class="mb-3">
      <label for="userId" class="form-label">Enter User ID</label>
      <input type="text" name="userId" id="userId" class="form-control" value="<?php echo htmlspecialchars($userId); ?>" required>
    </div>
    <div class="text-center mb-4">
      <button type="submit" name="searchUser" class="btn btn-primary">🔍 Search</button>
    </div>

    <div class="text-center mb-4">
    <a href="dashboard-admin.php" class="btn btn-danger">Back to Admin Dashboard</a>      <a href="see-users.php" class="btn btn-danger">See all Users</a>
    </div>

    <?php if ($name): ?>
    <div class="card">
      <div class="card-header bg-dark text-white">User Details</div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="fullName" id="fullName" class="form-control" value="<?php echo htmlspecialchars($name); ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="text" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($password); ?>" disabled>
        </div>
        <div class="text-center">
          <button type="button" id="editBtn" class="btn btn-warning">✏️ Edit Profile</button>
          <button type="submit" name="saveChanges" id="saveBtn" class="btn btn-success d-none">💾 Save Changes</button>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </form>
</div>

<script>
  const editBtn = document.getElementById('editBtn');
  const saveBtn = document.getElementById('saveBtn');

  if (editBtn) {
    editBtn.addEventListener('click', () => {
      document.getElementById('fullName').disabled = false;
      document.getElementById('email').disabled = false;
      document.getElementById('password').disabled = false;
      editBtn.classList.add('d-none');
      saveBtn.classList.remove('d-none');
    });
  }
</script>

<?php
    include_once 'footer.php';
?>