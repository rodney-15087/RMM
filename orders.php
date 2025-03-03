<?php
require 'db.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$product = $data['product'];
$quantity = $data['quantity'];

$sql = "INSERT INTO orders (product_id, quantity) VALUES ('$product', '$quantity')";

if ($conn->query($sql) === TRUE) {
    $response = ["message" => "Order created successfully!"];
} else {
    $response = ["message" => "Error: " . $sql . "<br>" . $conn->error];
}

echo json_encode($response);
?>