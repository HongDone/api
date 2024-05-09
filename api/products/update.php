<?php
session_start();
$imagesData = array_map(function ($id) {
    return ['id' => $id];
}, $_SESSION["images"]);
$tagsData = array_map(function ($name) {
    return ['name' => $name];
}, $_SESSION["tags"]);
$categoriesData = array_map(function ($id) {
    return ['id' => $id];
}, $_SESSION["categories"]);

$data = [
    'name' => $_SESSION['name'],
    'slug' => $_SESSION["slug"],
    'regular_price' => $_SESSION["regular_price"],
    'sale_price'  => $_SESSION["sale_price"],
    'stock_quantity' => $_SESSION['stock_quantity'],
    'backorders' => $_SESSION["backorders"],
    'status' => $_SESSION["status"],
    'sku' => $_SESSION["sku"],
    'description' => $_SESSION["description"],
    'images' => $imagesData,
    'tags' => $tagsData,
    'categories' => $categoriesData
];
$woocommerce->put('products/' . $_SESSION["id"], $data);
header("Location: http://localhost/fluffybunny/index.php?page=productDetails&id=$_SESSION[id]");
session_destroy();
?>