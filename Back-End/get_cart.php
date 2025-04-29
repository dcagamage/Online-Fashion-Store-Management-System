<?php
include 'db.php';

$customer_id = 1;

$result = $conn->query("SELECT c.Id as CartId, cp.Product_id, cp.Quantity 
                        FROM cart c
                        JOIN cart_product cp ON c.Id = cp.Cart_id
                        WHERE c.Customer_id = $customer_id");

$cart_items = array();
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

echo json_encode($cart_items);
?>
