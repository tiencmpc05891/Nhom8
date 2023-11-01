<?php
class CategoryDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   
    public function addCategory($categoryName) {
        try {
            $query = "INSERT INTO loaihanghoa (TenLoaiHang) VALUES (:categoryName)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':categoryName', $categoryName);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getCategoryById($categoryId) {
        try {
            $query = "SELECT * FROM loaihanghoa WHERE MaLoaiHang = :categoryId";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':categoryId', $categoryId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
    
  
    public function updateCategory($categoryID, $newCategoryName) {
        try {
            $query = "UPDATE loaihanghoa SET TenLoaiHang = :newCategoryName WHERE MaLoaiHang = :categoryID";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':categoryID', $categoryID);
            $stmt->bindParam(':newCategoryName', $newCategoryName);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

  
    public function deleteCategory($categoryID) {
        try {
            $query = "DELETE FROM loaihanghoa WHERE MaLoaiHang = :categoryID";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':categoryID', $categoryID);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getProductCountByCategory($categoryId) {
        $query = "SELECT COUNT(*) as total FROM hanghoa WHERE MaLoaiHang = :categoryId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
 
    public function getCategories($start = 0, $limit = 100) {
        $query = "SELECT * FROM loaihanghoa ORDER BY MaLoaiHang ASC LIMIT $start, $limit";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getTotalCategoryCount() {
        $query = "SELECT COUNT(MaLoaiHang) as total FROM loaihanghoa";
        $totalResult = $this->pdo->query($query);
        $totalRow = $totalResult->fetch(PDO::FETCH_ASSOC);
        return $totalRow['total'];
    }
}

?>
