<?php
session_start();
$tagsData = array_map(function ($name) {
    return ['name' => $name];
}, $_SESSION["tags"]);
$categoriesData = array_map(function ($id) {
    return ['id' => $id];
}, $_SESSION["categories"]);
$data = [
    'name' => $_SESSION['name'],
    'regular_price' => $_SESSION["regular_price"],
    'sale_price' => $_SESSION["sale_price"],
    'sku' => $_SESSION["sku"],
    'stock_quantity' => $_SESSION['stock_quantity'],
    'backorders' => $_SESSION["backorders"],
    'status' => $_SESSION["status"],
    'description' => $_SESSION["description"],
    'tags' => $tagsData,
    'categories' => $categoriesData
];
$woocommerce->post('products/', $data);
header("Location: http://localhost/fluffybunny/index.php?page=productAll");
session_destroy();
?>