<?php
// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_fashion_store_management_system";  // Corrected name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $adminID = $_POST['adminID'];
    $adminName = $_POST['adminName'];
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];

    if (isset($_GET['edit'])) {
        // Update existing admin details
        $updateQuery = "UPDATE admin_details 
                        SET name=?, email=?, password=? 
                        WHERE admin_id=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssss", $adminName, $email, $passwordInput, $adminID);

        if ($stmt->execute()) {
            header("Location: manage-admin.php?updated=1");
            exit();
        } else {
            echo "❌ Error updating: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Insert new admin details
        $insertQuery = "INSERT INTO admin_details (admin_id, name, email, password) 
                        VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $adminID, $adminName, $email, $passwordInput);

        if ($stmt->execute()) {
            header("Location: manage-admin.php?success=1");
            exit();
        } else {
            echo "❌ Error inserting: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}

// If editing an admin, fetch existing details
$editMode = false;
if (isset($_GET['edit'])) {
    $editMode = true;
    $adminID = $_GET['edit'];

    // Establish database connection to fetch admin details
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM admin_details WHERE admin_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $adminID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $adminID = $row['admin_id'];
        $adminName = $row['name'];
        $email = $row['email'];
        $passwordInput = $row['password']; // You can choose to show or not show the old password
    } else {
        echo "❌ Admin not found.";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add/Edit Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleAddA.css">
</head>
<body>

<div class="container py-5">
  <h1 class="mb-4"><?= $editMode ? '🖋️ Edit Admin' : '➕ Add New Admin' ?></h1>

  <!-- IMPORTANT: form action now points to itself with the edit ID if editing -->
  <form action="add-admin.php<?= $editMode ? '?edit=' . $adminID : '' ?>" method="post" id="adminForm">
    <div class="mb-3">
      <label for="adminID" class="form-label">Admin ID</label>
      <input type="text" class="form-control" id="adminID" name="adminID" required value="<?= $editMode ? htmlspecialchars($adminID) : '' ?>" <?= $editMode ? 'readonly' : '' ?>>
    </div>

    <div class="mb-3">
      <label for="adminName" class="form-label">Admin Name</label>
      <input type="text" class="form-control" id="adminName" name="adminName" required value="<?= $editMode ? htmlspecialchars($adminName) : '' ?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" required value="<?= $editMode ? htmlspecialchars($email) : '' ?>">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required value="<?= $editMode ? htmlspecialchars($passwordInput) : '' ?>">
    </div>

    <button type="submit" class="btn btn-success">
      <?= $editMode ? '💾 Save Changes' : '💾 Save Admin' ?>
    </button>

    <a href="manage-admin.php" class="btn btn-secondary">🔙 Cancel</a>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Internal style -->
<style>
body {
  background-color: #f9f9f9;
}

h1 {
  font-weight: bold;
  color: #333;
}

form {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

button {
  margin-right: 10px;
}
</style>

<!-- Form validation script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("adminForm");

  form.addEventListener("submit", function(event) {
    const email = document.getElementById("email").value;
    if (!email.includes("@")) {
      alert("Please enter a valid email address!");
      event.preventDefault(); // stop form submission
    }
  });
});
</script>

</body>
</html>
