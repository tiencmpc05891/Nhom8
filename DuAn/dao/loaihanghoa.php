<?php


class LoaiHangHoaDAO {
    private $pdo;

    public function __construct() {
        $connection = new PDOConnection();
        $this->pdo = $connection->getConnection();
    }

    public function getLoaiHang($maLoaiHang) {
        $query = "SELECT * FROM loaihanghoa WHERE MaLoaiHang = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $maLoaiHang);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function closeConnection() {
        $this->pdo = null;
    }
}
?>