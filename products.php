<?php
require 'db.php';

header('Content-Type: application/json');

// Predefined list of agricultural products including pesticides, herbicides, seeds, and fertilizers
$products = [
    ["id" => 1, "name" => "Apples"],
    ["id" => 2, "name" => "Oranges"],
    ["id" => 3, "name" => "Bananas"],
    ["id" => 4, "name" => "Tomatoes"],
    ["id" => 5, "name" => "Potatoes"],
    ["id" => 6, "name" => "Carrots"],
    ["id" => 7, "name" => "Wheat"],
    ["id" => 8, "name" => "Rice"],
    ["id" => 9, "name" => "Corn"],
    ["id" => 10, "name" => "Soybeans"],
    ["id" => 11, "name" => "Pesticide A"],
    ["id" => 12, "name" => "Pesticide B"],
    ["id" => 13, "name" => "Herbicide A"],
    ["id" => 14, "name" => "Herbicide B"],
    ["id" => 15, "name" => "Seed A"],
    ["id" => 16, "name" => "Seed B"],
    ["id" => 17, "name" => "Fertilizer A"],
    ["id" => 18, "name" => "Fertilizer B"]
];

// Insert predefined products into the database if not already present
foreach ($products as $product) {
    $name = $product['name'];
    $sql = "INSERT IGNORE INTO products (name) VALUES ('$name')";
    $conn->query($sql);
}

// Fetch products from the database
$result = $conn->query("SELECT * FROM products");
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

echo json_encode($products);
?>