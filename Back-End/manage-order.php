<?php
// Handle deletion request before any output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    $conn = new mysqli('localhost', 'root', '', 'online_fashion_store_management_system');
    if ($conn->connect_error) {
        http_response_code(500);
        echo 'error';
        exit();
    }

    $id = $conn->real_escape_string($_POST['id']);

    $sql = "DELETE FROM order_table WHERE Id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        http_response_code(500);
        echo 'error';
    }

    $conn->close();
    exit();
}
?>

<?php
    include_once 'header.php';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>

  <div class="container py-5">
    <h1 class="mb-4">📦 Order Management</h1>

    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Address Type</th>
          <th>Payment Method</th>
          <th>Payment Status</th>
          <th>Ordered Date</th>
          <th>Ordered Time</th>
          <th>Status</th>
          <th>Cart ID</th>
          <th>Delivery ID</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="orderTableBody">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'online_fashion_store_management');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = "SELECT * FROM order_table ORDER BY Id DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $id = $row['Id'];
            echo "<tr data-id='{$id}'>
                    <td>{$id}</td>
                    <td>{$row['Phone_number']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['Address_type']}</td>
                    <td>{$row['Payment_method']}</td>
                    <td>{$row['Payment_status']}</td>
                    <td>{$row['Ordered_date']}</td>
                    <td>{$row['Ordered_time']}</td>
                    <td>{$row['Status']}</td>
                    <td>{$row['Cart_id']}</td>
                    <td>{$row['Delivery_id']}</td>
                    <td><button class='btn btn-danger btn-sm delete-btn'>🗑️ Delete</button></td>
                  </tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>

    <a href="dashboard-admin.php" class="btn btn-secondary mt-3">🔙 Back to Dashboard</a>
  </div>

  <script>
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const row = this.closest('tr');
        const id = row.getAttribute('data-id');

        if (confirm('Are you sure you want to delete this order?')) {
          fetch('manage-order.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'delete_order=1&id=' + id
          })
            .then(response => response.text())
            .then(data => {
              if (data.trim() === 'success') {
                row.remove();
                alert('✅ Order deleted successfully!');
              } else {
                alert('❌ Error deleting order.');
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
