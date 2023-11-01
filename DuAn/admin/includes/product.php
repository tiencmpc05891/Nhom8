<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getProducts($start, $limit) {
        $query = "SELECT * FROM hanghoa ORDER BY MSHH ASC LIMIT $start, $limit";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalProductCount() {
        $countQuery = "SELECT COUNT(MSHH) as total FROM hanghoa";
        $totalResult = $this->pdo->query($countQuery);
        $totalRow = $totalResult->fetch(PDO::FETCH_ASSOC);
        return $totalRow['total'];
    }

    public function getProductById($productId) {
        $query = "SELECT * FROM hanghoa WHERE MSHH = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProduct($tenHangHoa, $gia, $ghiChu, $img, $maLoaiHang) {
        $query = "INSERT INTO hanghoa (TenHH, Gia, GhiChu, img, MaLoaiHang) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$tenHangHoa, $gia, $ghiChu, $img, $maLoaiHang]);
    
        // Kiểm tra xem có thêm thành công hay không
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    
    
    public function updateProduct($productId, $new_product_name, $new_product_price, $new_product_description, $new_product_image, $new_product_category) {
        $query = "UPDATE hanghoa SET TenHH = :new_product_name, Gia = :new_product_price, GhiChu = :new_product_description, img = :new_product_image, MaLoaiHang = :new_product_category WHERE MSHH = :product_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':new_product_name', $new_product_name);
        $stmt->bindParam(':new_product_price', $new_product_price);
        $stmt->bindParam(':new_product_description', $new_product_description);
        $stmt->bindParam(':new_product_image', $new_product_image);
        $stmt->bindParam(':new_product_category', $new_product_category);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    }
    
    public function deleteProduct($productId) {
        $sql = "DELETE FROM hanghoa WHERE MSHH = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();

        // Kiểm tra xem sản phẩm đã được xóa thành công
        if ($stmt->rowCount() > 0) {
            return true; // Sản phẩm đã được xóa thành công
        } else {
            return false; // Không tìm thấy sản phẩm hoặc có lỗi xảy ra
        }
    }
}
?>
