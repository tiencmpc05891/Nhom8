<?php
require('../includes/product.php');
require('../includes/db_connection.php');

$pdoConnection = new DatabaseConnection();
$pdo = $pdoConnection->getConnection();

$productDAO = new Product($pdo);

if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $isDeleted = $productDAO->deleteProduct($product_id);

    if ($isDeleted) {
        echo '<script>alert("Xóa sản phẩm thành công."); window.location.href = "../pages/product.php";</script>';
    } else {
        echo '<div class="alert alert-danger">Không thể xóa sản phẩm.</div>';
    }
} else {
    echo '<div class="alert alert-warning">Không có sản phẩm nào được chọn để xóa.</div>';
}
