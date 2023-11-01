<?php
require('../includes/db_connection.php');
require('../includes/category.php');

$pdoConnection = new DatabaseConnection();
$pdo = $pdoConnection->getConnection();

$categoryDAO = new CategoryDAO($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_type_id"]) && isset($_POST["new_product_type"])) {
    $product_type_id = $_POST["product_type_id"];
    $new_product_type = $_POST["new_product_type"];

    if ($categoryDAO->updateCategory($product_type_id, $new_product_type)) {
        echo '<script>alert("Loại sản phẩm đã được cập nhật thành công."); window.location.href = "../pages/category.php";</script>';
    } else {
        echo "Lỗi khi cập nhật danh mục.";
    }
}

$product_type_id = isset($_GET["product_type_id"]) ? $_GET["product_type_id"] : null;
if ($product_type_id !== null) {
    $category = $categoryDAO->getCategoryById($product_type_id);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>

body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}


.card {
    width: 300px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Tiêu đề của thẻ card */
.card-header {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    padding: 10px;
    border-radius: 8px 8px 0 0;
}

/* Phần tiêu đề */
.card-title {
    font-size: 18px;
}

/* Phần nội dung của thẻ card */
.card-body {
    padding: 20px;
}

/* Điều chỉnh kích thước và giao diện của input và nút */
.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">Chỉnh sửa loại sản phẩm</h3>
                </div>
            </div>
            <div class="card-body px-4">
                <form action="" method="POST">
                    <input type="hidden" name="product_type_id" value="<?= $category['MaLoaiHang'] ?>">
                    <div class="form-group">
                        <label for="new_product_type">Tên Loại Sản phẩm</label>
                        <input type="text" class="form-control" id="new_product_type" name="new_product_type" value="<?= $category['TenLoaiHang'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>