<?php
require('../includes/db_connection.php');
require('../includes/product.php');
require('../includes/category.php'); // Import CategoryDAO

$pdoConnection = new DatabaseConnection();
$pdo = $pdoConnection->getConnection();

$productDAO = new Product($pdo);
$categoryDAO = new CategoryDAO($pdo); // Khởi tạo CategoryDAO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $new_product_name = $_POST['new_product_name'];
    $new_product_price = $_POST['new_product_price'];
    $new_product_description = $_POST['new_product_description'];
    $new_product_category = $_POST['new_product_category']; // Lấy loại hàng hóa mới

    if (empty($new_product_name) || empty($new_product_price) || empty($new_product_description)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
    } else {
        if ($_FILES['new_product_image']['error'] === UPLOAD_ERR_OK) {
            $new_product_image = 'uploads/' . $_FILES['new_product_image']['name'];
            move_uploaded_file($_FILES['new_product_image']['tmp_name'], $new_product_image);
        } else {
            $product = $productDAO->getProductById($product_id);

            if ($product) {
                $new_product_image = $product['img'];
            }
        }

        // Cập nhật sản phẩm với loại hàng hóa mới
        $productDAO->updateProduct($product_id, $new_product_name, $new_product_price, $new_product_description, $new_product_image, $new_product_category);

        echo '<script>alert("Sản phẩm đã được cập nhật thành công."); window.location.href = "../pages/product.php";</script>';
    }
}

if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $product = $productDAO->getProductById($product_id);

    if (!$product) {
        echo "Không có sản phẩm nào được chọn để chỉnh sửa.";
        exit;
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa Sản phẩm</title>
</head>
<body>
    <style>/* CSS cho trang chỉnh sửa sản phẩm (editproduct.php) */
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
    width: 400px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
    padding: 10px;
    border-radius: 8px 8px 0 0;
    text-align: center;
}

.card-title {
    font-size: 18px;
}

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
/* Các style khác tùy theo thiết kế của bạn */
</style>

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">Chỉnh sửa sản phẩm</h3>
                </div>
            </div>
            <div class="card-body px-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?= $product['MSHH'] ?>">
                    <div class="form-group">
                        <label for="new_product_name">Tên Hàng hóa</label>
                        <input type="text" class="form-control" id="new_product_name" name="new_product_name" value="<?= $product['TenHH'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="new_product_price">Giá</label>
                        <input type="text" class="form-control" id="new_product_price" name="new_product_price" value="<?= $product['Gia'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="new_product_description">Mô tả</label>
                        <textarea class="form-control" id="new_product_description" name="new_product_description" required><?= $product['GhiChu'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="new_product_category">Loại hàng hóa</label>
                        <select class="form-control" id="new_product_category" name="new_product_category" required>
                            <?php
                            // Lấy danh sách các loại hàng hóa từ cơ sở dữ liệu
                            $categories = $categoryDAO->getCategories(0, 100); // Thay thế 0 và 100 bằng giới hạn và vị trí bắt đầu thích hợp
                            foreach ($categories as $category) {
                                // Kiểm tra xem loại hàng hóa này có trùng với sản phẩm đang chỉnh sửa hay không
                                $selected = ($category["MaLoaiHang"] == $product["MaLoaiHang"]) ? 'selected' : '';
                                echo '<option value="' . $category["MaLoaiHang"] . '" ' . $selected . '>' . $category["TenLoaiHang"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="new_product_image">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="new_product_image" name="new_product_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
