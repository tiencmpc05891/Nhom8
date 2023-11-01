<?php
require('PDOConnection.php');

class PasswordChangeDAO {
    private $conn;

    public function __construct($conn) {
        $registrationDAO = new RegistrationDAO($conn);
        $this->conn = $conn;
    }

    public function changePassword($userId, $currentPassword, $newPassword) {
        // Kiểm tra mật khẩu hiện tại
        $query = "SELECT MatKhau FROM khachhang WHERE MSKH = :mskh";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mskh', $userId);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result && $currentPassword === $result['MatKhau']) {
            // Mật khẩu hiện tại chính xác
            $update_query = "UPDATE khachhang SET MatKhau = :new_password WHERE MSKH = :mskh";
            $update_stmt = $this->conn->prepare($update_query);
            $update_stmt->bindParam(':new_password', $newPassword);
            $update_stmt->bindParam(':mskh', $userId);

            if ($update_stmt->execute()) {
                return true; 
            } else {
                return false; 
            }
        } else {
            return false;
        }
    }
}
?>
