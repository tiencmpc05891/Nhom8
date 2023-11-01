<?php
require_once 'PDOConnection.php';

class HangHoaDAO {
    private $pdo;

    public function __construct() {
        $connection = new PDOConnection();
        $this->pdo = $connection->getConnection();
    }

    public function getAllProducts($start, $limit) {
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
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $productId);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function closeConnection() {
        $this->pdo = null;
    }
}

?>


