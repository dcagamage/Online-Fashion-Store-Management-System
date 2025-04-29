<?php
    include_once 'header.php';
?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>

<!-- Main Content -->
<div class="container py-5">
  <h1 class="text-center mb-5">Welcome, Admin! 👋</h1>

  <div class="row g-4">
    <!-- Product Management -->
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
          <h5 class="card-title mt-3">Product Management</h5>
          <p class="card-text">Manage your products here.</p>
          <a href="manage-product.php" class="btn btn-primary">Manage Products</a>
        </div>
      </div>
    </div>

    <!-- Order Management -->
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <i class="bi bi-cart-check" style="font-size: 3rem;"></i>
          <h5 class="card-title mt-3">Order Management</h5>
          <p class="card-text">View and process orders.</p>
          <a href="manage-order.php" class="btn btn-success">Manage Orders</a>
        </div>
      </div>
    </div>

    <!-- User Management -->
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <i class="bi bi-people" style="font-size: 3rem;"></i>
          <h5 class="card-title mt-3">User Management</h5>
          <p class="card-text">Manage customer accounts.</p>
          <a href="manage-user.php" class="btn btn-warning">Manage Users</a>
        </div>
      </div>
    </div>

    <!-- Admin Management -->
    <div class="col-md-6 col-lg-3">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <i class="bi bi-person-gear" style="font-size: 3rem;"></i>
          <h5 class="card-title mt-3">Admin Management</h5>
          <p class="card-text">Manage admin users.</p>
          <a href="manage-admin.php" class="btn btn-danger">Manage Admins</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="scriptA.js"></script>

<?php
    include_once 'footer.php';
?>
