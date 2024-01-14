<?php

require 'Cart.php';
require 'Product.php';

session_start();

$products = [
    1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1800, 'quantity' => 1],
    2 => ['id' => 2, 'name' => 'mouse', 'price' => 80, 'quantity' => 1],
    3 => ['id' => 3, 'name' => 'teclado', 'price' => 150, 'quantity' => 1],
    4 => ['id' => 4, 'name' => 'monitor', 'price' => 1200, 'quantity' => 1],
    5 => ['id' => 5, 'name' => 'microondas', 'price' => 600, 'quantity' => 1],
    6 => ['id' => 6, 'name' => 'cadeira', 'price' => 100, 'quantity' => 1],
];

if(isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $productInfo = $products[$id];
    $product = new Product;
    $product->setId($productInfo['id']);
    $product->setName($productInfo['name']);
    $product->setPrice($productInfo['price']);
    $product->setQuantity($productInfo['quantity']);

    $cart = new Cart;
    $cart->add($product);
}

var_dump($_SESSION['cart'] ?? []);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="./myCart.php">Go to cart</a>
    <ul>
        <li>Geladeira <a href="?id=1">Add</a> R$ 1800</li>
        <li>Mouse <a href="?id=2">Add</a> R$ 80</li>
        <li>Teclado <a href="?id=3">Add</a> R$ 150</li>
        <li>Monitor <a href="?id=4">Add</a> R$ 1200</li>
        <li>Microondas <a href="?id=5">Add</a> R$ 600</li>
        <li>Cadeira <a href="?id=6">Add</a> R$ 100</li>
    </ul>
</body>
</html>