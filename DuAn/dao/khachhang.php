<?php

class LoginDAO {
    private $conn;

    public function __construct($conn) {
        $registrationDAO = new RegistrationDAO($conn);
        $this->conn = $conn;
    }

    public function loginCustomer($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM khachhang WHERE Email = :username AND MatKhau = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function loginAdmin($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE TaiKhoan = :username AND PassWord = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch();
    }
}
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
class ProfileDAO {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function getUserInfo($userId) {
        $query = "SELECT * FROM khachhang WHERE MSKH = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function updateUserProfile($userId, $newUsername, $newEmail, $newPhoneNumber, $newAddress, $newUserImage) {
        $updateQuery = "UPDATE khachhang SET HoTenKH = :username, Email = :email, SoDienThoai = :phoneNumber, DiaChi = :address, Anh = :userImage WHERE MSKH = :userId";
        $stmt = $this->conn->prepare($updateQuery);
        $stmt->bindParam(':username', $newUsername);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':phoneNumber', $newPhoneNumber);
        $stmt->bindParam(':address', $newAddress);
        $stmt->bindParam(':userImage', $newUserImage);
        $stmt->bindParam(':userId', $userId);

        if ($stmt->execute()) {
            return true;  
        } else {
            return false; 
        }
    }
}
class PasswordChangeDAO {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
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
