<?php
class PDOConnection {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=duanmau", "root", "mysql");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function closeConnection() {
        $this->pdo = null;
    }

}

