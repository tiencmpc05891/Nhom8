<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
require '../dao/khachhang.php';
require '../dao/PDOConnection.php';
$pdoConnection = new PDOConnection();
$conn = $pdoConnection->getConnection();
$passwordChangeDAO = new PasswordChangeDAO($conn);

$errors = array(); // Mảng chứa các thông báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra dữ liệu
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $errors[] = "Vui lòng điền đầy đủ thông tin.";
    }

    // Kiểm tra mật khẩu hiện tại
    $query = "SELECT MatKhau FROM khachhang WHERE MSKH = :mskh";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':mskh', $user['MSKH']);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!$result || $current_password !== $result['MatKhau']) {
        $errors[] = "Mật khẩu hiện tại không đúng.";
    }

    // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới
    if ($new_password !== $confirm_password) {
        $errors[] = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
    }

    // Nếu không có lỗi, thực hiện thay đổi mật khẩu
    if (empty($errors)) {
        $result = $passwordChangeDAO->changePassword($user['MSKH'], $current_password, $new_password);

        if ($result === true) {
            echo '<script>alert("Đổi mật khẩu thành công."); window.location.href = "profile.php";</script>';
            exit();
        } else {
            // Hiển thị thông báo lỗi bằng JavaScript
            echo '<script>alert("Lỗi khi đổi mật khẩu.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đổi mật khẩu</title>
</head>
<body>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #fff;
            max-width: 400px;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #333;
        } 
    </style><script>
    <?php if (!empty($errors)): ?>
        alert("<?php echo implode('\n', $errors); ?>");
    <?php endif; ?>
</script>
      <h1>Đổi mật khẩu</h1>
<form method="post" action="">
    <label for="current_password">Mật khẩu hiện tại:</label>
    <input type="password" name="current_password" id="current_password">
    <br>

    <label for="new_password">Mật khẩu mới:</label>
    <input type="password" name="new_password" id="new_password">
    <br>

    <label for="confirm_password">Xác nhận mật khẩu mới:</label>
    <input type="password" name="confirm_password" id="confirm_password">
    <br>

    <input type="submit" value="Đổi mật khẩu">
</form>

</body>
</html>
