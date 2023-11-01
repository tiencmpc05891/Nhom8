<?php
class RegistrationDAO {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function registerUser($username, $email, $password, $avatar_path) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO khachhang (HoTenKH, Email, MatKhau, Anh) VALUES (:HoTenKH, :Email, :MatKhau, :Anh)");
            $stmt->bindParam(':HoTenKH', $username);
            $stmt->bindParam(':Email', $email);
            $stmt->bindParam(':MatKhau', $password);
            $stmt->bindParam(':Anh', $avatar_path);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
?>
