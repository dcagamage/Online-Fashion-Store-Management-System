<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <link rel="stylesheet" href="CSS/order_success.css">

<?php
    include_once 'navbar.php';
?>

</head>
<body>

<?php include_once 'navbar.php'; ?>

<div class="success-container">
    <div class="success-icon">✅</div>
    <div class="success-message">Thank You! Your Order Was Successful</div>
    <a href="order-status.php" class="home-btn">View Order</a>
</div>

<?php
    include_once 'footer.php';
?> 

