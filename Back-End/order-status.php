<?php
require_once 'includes/dbh.inc.php';

$orderData = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $conn->real_escape_string($_POST['Phone_number']);

$stmt = $conn->prepare("
    SELECT o.*, p.Name, p.image 
    FROM order_table o
    JOIN cart_product cp ON o.Cart_id = cp.Cart_id
    JOIN product p ON cp.Product_id = p.Id
    WHERE o.Phone_number = ?
");

if (!$stmt) {
    // Output any errors in the query
    die("SQL prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $phoneNumber);
$stmt->execute();
$result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $orderData = [];
        while ($row = $result->fetch_assoc()) {
            $orderData[] = $row;
        }
    } else {
        $error = "No order found for the given Phone Number.";
    }

}
?>

<?php
    include_once 'header.php';
?>
    <link rel="stylesheet" href="CSS/order.css">
    <link rel="stylesheet" href="CSS/navbar-footer.css">

<?php
    include_once 'navbar.php';
?>

    <!-- customer_id -->
    <h2>Track Your Order</h2>
    <div class="order-wrapper animate-fade">
    <div class="container">
    
    <form method="POST">
		<input 
			type="text" 
			name="Phone_number" 
			placeholder="Enter your Phone Number" 
			class="input-small" 
			autocomplete="off"
			required
			inputmode="numeric"
			pattern="[0-9]+"
		/>

        <button type="submit" class="check-btn-small"><i class="fa-solid fa-magnifying-glass"></i> Check Status</button>

    </form>
    <br>
    <?php if ($orderData): ?>
    <?php foreach ($orderData as $data): ?>
        <hr>
        <div class="order-details-step">
            <h3><i class="fa-solid fa-receipt"></i> Order ID: <?= htmlspecialchars($data['Id']) ?></h3>

            <div class="step-section">
                <h4><i class="fa-solid fa-user"></i> Customer Details</h4>
                <p><strong>Phone Number:</strong> <?= htmlspecialchars($data['Phone_number']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-location-dot"></i> Delivery Address</h4>
                <p><strong>Address:</strong> <?= htmlspecialchars($data['Address']) ?></p>
                <p><strong>Type:</strong> <?= htmlspecialchars($data['Address_type']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-money-bill-wave"></i> Payment Info</h4>
                <p><strong>Method:</strong> <?= htmlspecialchars($data['Payment_method']) ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($data['Payment_status']) ?></p>
            </div>

            <div class="step-section">
                <h4><i class="fa-solid fa-box"></i> Product Info</h4>
                <p><strong>Product:</strong> <?= htmlspecialchars($data['Name']) ?></p>	
				<p><strong>Cart ID:</strong> <?= htmlspecialchars($data['Cart_id']) ?></p>
                <p><strong>Ordered Date:</strong> <?= htmlspecialchars($data['Ordered_date']) ?></p>
                <p><strong>Ordered Time:</strong> <?= htmlspecialchars($data['Ordered_time']) ?></p>
            </div>


            <!-- <div class="step-section">
                <h4>Status:</h4>
                <div class="status-tracker">
                    <?php
                    $steps = [
                        'Ordered' => '🛒',
                        'Packed' => '📦',
                        'Shipped' => '🚚',
                        'Out for Delivery' => '📍',
                        'Delivered' => '✅'
                    ];
                    $statusReached = true;
                    foreach ($steps as $step => $icon) {
                        $active = $statusReached ? 'step-box active' : 'step-box';
                        echo "<div class='$active'><div class='icon'>$icon</div><div class='label'>$step</div></div>";
                        if ($step === $data['Status']) $statusReached = false;
                    }
                    ?>
                </div>
            </div> -->
        </div>
    <?php endforeach; ?>
<?php elseif ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>


</div>
</div>

<?php
    include_once 'footer.php';
?>