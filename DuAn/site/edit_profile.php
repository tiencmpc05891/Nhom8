<?php
session_start();
require '../dao/PDOConnection.php';
require '../dao/khachhang.php';

$pdoConnection = new PDOConnection();
$conn = $pdoConnection->getConnection();
$profileDAO = new ProfileDAO($conn);

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPhoneNumber = $_POST['phoneNumber'];
    $newAddress = $_POST['address'];

   
    if (empty($newUsername) || empty($newEmail) || empty($newPhoneNumber) || empty($newAddress)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
    } else {
        
        if (isset($_FILES['userImage']) && $_FILES['userImage']['error'] === UPLOAD_ERR_OK) {
            $imagePath = 'uploads/' . $_FILES['userImage']['name'];
            move_uploaded_file($_FILES['userImage']['tmp_name'], $imagePath);
            $newUserImage = $imagePath;
        } else {
            $newUserImage = $user['Anh'];
        }

        $result = $profileDAO->updateUserProfile($user['MSKH'], $newUsername, $newEmail, $newPhoneNumber, $newAddress, $newUserImage);

        if ($result) {
            echo '<script>alert("Cập nhật thành công."); window.location.href = "profile.php";</script>';
            exit();
        } else {
            echo "Lỗi khi cập nhật thông tin.";
        }
    }
}

$userInfo = $profileDAO->getUserInfo($user['MSKH']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <style>
     
        /* CSS để tùy chỉnh giao diện */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: blue;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
    </style>
    <div class="container">
    <h1>Chỉnh sửa thông tin</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <label for="username">Tên người dùng:</label>
    <input type="text" name="username" id="username" value="<?php echo $user['HoTenKH']; ?>">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $user['Email']; ?>">
    <br>
    <label for="phoneNumber">Số điện thoại:</label>
    <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $user['SoDienThoai']; ?>">
    <br>
    <label for="address">Địa chỉ:</label>
    <input type="text" name="address" id="address" value="<?php echo $user['DiaChi']; ?>">
    <br>
    <label for="userImage">Avt:</label>
    <input type="file" name="userImage" id="userImage" >
    <br>
    <input type="submit" value="Save Changes">
</form>

</div>

</body>
</html>
