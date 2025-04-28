<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>

    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .success-container {
            padding: 50px 20px;
            margin-top: 20px;
        }

        .success-icon {
            font-size: 80px;
            color: #00b894;
        }

        .success-message {
            font-size: 32px;
            font-weight: bold;
            margin-top: 20px;
            color: #2d3436;
        }

        .order-details {
            margin-top: 20px;
            font-size: 18px;
            color: #636e72;
        }

        .home-btn {
            margin-top: 30px;
            display: inline-block;
            padding: 12px 30px;
            background-color: #00b894;
            color: white;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .home-btn:hover {
            background-color: #019875;
        }
    </style>
</head>
<body>

<?php include_once 'navbar.php'; ?>

<div class="success-container">
    <div class="success-icon">✅</div>
    <div class="success-message">Thank You! Your Order Was Successful</div>
    <a href="home.php" class="home-btn">Continue Shopping</a>
</div>

<?php
    include_once 'footer.php';
?> 

