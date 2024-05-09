<?php
if (isset($_GET["id"])) {
    $productID = $_GET["id"];
    $woocommerce->delete('products/' . $productID);
    header("Location: http://localhost/fluffybunny/index.php?page=productAll
    ");
}
?>