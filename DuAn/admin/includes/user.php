<?php
class CustomerDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCustomers($start, $limit) {
        $query = "SELECT * FROM khachhang ORDER BY MSKH ASC LIMIT $start, $limit";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCustomerCount() {
        $countQuery = "SELECT COUNT(MSKH) as total FROM khachhang";
        $totalResult = $this->pdo->query($countQuery);
        $totalRow = $totalResult->fetch(PDO::FETCH_ASSOC);
        return $totalRow['total'];
    }
}
