<?php
require('../includes/db_connection.php');
require('../includes/category.php');

$pdoConnection = new DatabaseConnection();
$pdo = $pdoConnection->getConnection();

$categoryDAO = new CategoryDAO($pdo);

// Xóa loại sản phẩm nếu product_type_id được truyền từ URL
if (isset($_GET["product_type_id"])) {
    $product_type_id = $_GET["product_type_id"];

    if ($categoryDAO->deleteCategory($product_type_id)) {
        echo '<script>alert("Xóa loại sản phẩm thành công."); window.location.href = "../pages/category.php";</script>';
    } else {
        echo "Lỗi khi xóa loại sản phẩm.";
    }
}
?>
