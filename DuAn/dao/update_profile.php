<?php
class ProfileDAO {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }
    public function updateUserProfile($userId, $newUsername, $newEmail, $newPhoneNumber, $newAddress) {
        $updateQuery = "UPDATE khachhang SET HoTenKH = :username, Email = :email, SoDienThoai = :phoneNumber, DiaChi = :address WHERE MSKH = :userId";
        $stmt = $this->conn->prepare($updateQuery);
        $stmt->bindParam(':username', $newUsername);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':phoneNumber', $newPhoneNumber);
        $stmt->bindParam(':address', $newAddress);
        $stmt->bindParam(':userId', $userId);

        if ($stmt->execute()) {
            return true; // Cập nhật thành công
        } else {
            return false; // Có lỗi khi cập nhật thông tin
        }
    }
}
?>
