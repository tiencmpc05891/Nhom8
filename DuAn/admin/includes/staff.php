<?php 
class StaffDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getStaff($start, $limit)
    {
        $query = "SELECT * FROM nhanvien ORDER BY MSNV ASC LIMIT $start, $limit";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalStaffCount()
    {
        $countQuery = "SELECT COUNT(MSNV) as total FROM nhanvien";
        $totalResult = $this->pdo->query($countQuery);
        $totalRow = $totalResult->fetch(PDO::FETCH_ASSOC);
        return $totalRow['total'];
    }
    public function addStaff($staff_name, $staff_position, $staff_address, $staff_phone) {
        try {
            // Truy vấn SQL để thêm nhân viên
            $query = "INSERT INTO nhanvien (HoTenNV, ChucVu, DiaChi, SoDienThoai) VALUES (:staff_name, :staff_position, :staff_address, :staff_phone)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':staff_name', $staff_name);
            $stmt->bindParam(':staff_position', $staff_position);
            $stmt->bindParam(':staff_address', $staff_address);
            $stmt->bindParam(':staff_phone', $staff_phone);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>