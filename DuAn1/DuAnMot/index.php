<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";
include "site/header.php";
include "site/navmenu.php";
$dsdm = loadall_danhmuc();


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "site/home.php";
            break;
        case 'shop':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "site/shop.php";
            break;
        case 'detail':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                include "site/detail.php";
            } else {
                include "site/home.php";
            }
            break;
        case 'cart':
            include "site/cart.php";
            break;
        case 'checkout':
            include "site/checkout.php";
            break;
        case 'login':
            if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
                $user = $_POST["user"];
                $pass = $_POST["pass"];

                // Kiểm tra không để trống
                if (empty($user) && empty($pass)) {
                    $error_message = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
                } elseif (empty($user)) {
                    $error_message = 'Vui lòng nhập tên đăng nhập.';
                } elseif (empty($pass)) {
                    $error_message = 'Vui lòng nhập mật khẩu.';
                } else {
                    // Xử lý kiểm tra đăng nhập
                    $kq = checkuser($user, $pass);

                    if (is_array($kq) && (count($kq))) {
                        $_SESSION['user'] = $kq;
                        header('location: index.php');
                    } else {
                        $error_message = "Tài khoản không tồn tại hoặc thông tin đăng nhập sai!";
                    }
                }

                // Kiểm tra nếu có lỗi, lưu thông báo lỗi vào session và chuyển hướng về trang đăng nhập
                if (isset($error_message) && $error_message != "") {
                    $_SESSION['tb_dangnhap'] = $error_message;
                    header('location: index.php?act=dangnhap');
                }
            }
            break;
        case 'dangnhap':
            include 'site/login.php';
            break;
        case 'register':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                // Khởi tạo mảng lưu giá trị đã nhập
                $input_values = array('email' => $email, 'user' => $user);

                // Kiểm tra không để trống
                if (empty($user) || empty($pass) || empty($email)) {
                    $error_message = 'Vui lòng nhập tên đăng nhập, mật khẩu hoặc email, nếu bạn để trống! ';
                } elseif (username_exists($user)) {
                    $error_message = 'Tên đăng nhập đã được sử dụng. Vui lòng chọn tên khác.';
                } elseif (empty($pass)) {
                    $error_message = 'Vui lòng nhập mật khẩu.';
                } elseif ($pass !== $_POST['repassword']) {
                    $error_message = 'Mật khẩu xác nhận không khớp.';
                } elseif (email_exists($email)) {
                    $error_message = 'Email đã được sử dụng. Vui lòng sử dụng địa chỉ email khác.';
                } elseif (preg_match('/[^\p{L}\d\s]/u', $user)) {
                    $error_message = 'Tên đăng nhập không được chứa ký tự đặc biệt.';
                } elseif (strlen($pass) < 4) {
                    $error_message = 'Mật khẩu phải có ít nhất 4 ký tự.';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_message = 'Địa chỉ email không hợp lệ.';
                } else {
                    // Kiểm tra xem tài khoản hoặc email đã tồn tại chưa
                    $existingUser = pdo_query_one("SELECT * FROM taikhoan WHERE user = ? OR email = ?", $user, $email);

                    if ($existingUser) {
                        // Nếu tài khoản hoặc email đã tồn tại, hiển thị thông báo lỗi và giữ nguyên giá trị đã nhập
                        $_SESSION['tb_dangky'] = 'Tài khoản hoặc email đã tồn tại. Vui lòng chọn tài khoản hoặc email khác.';
                        $_SESSION['input_values'] = $input_values;
                        header('location: index.php?act=dangky');
                        exit; // Dừng xử lý tiếp theo
                    }

                    // Nếu không có tài khoản hoặc email trùng, thực hiện đăng ký
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = 'Đã đăng ký thành công. Mời bạn đăng nhập!';
                    header('location: index.php?act=dangnhap');
                }

                // Kiểm tra nếu có lỗi, lưu thông báo lỗi và giá trị đã nhập vào session
                if (isset($error_message) && $error_message != "") {
                    $_SESSION['tb_dangky'] = $error_message;
                    $_SESSION['input_values'] = $input_values;
                    header('location: index.php?act=dangky');
                }
            }
            unset($_SESSION['input_values']);
            break;
        case 'dangky':
            include 'site/register.php';
            break;
        case 'mytaikhoan':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {

                include "site/mytaikhoan.php";
            }
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                header('Location: index.php?act=edit_taikhoan');
            }
            include "site/edit_taikhoan.php";
            break;
        case 'dangxuat':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
                unset($_SESSION['user']);
            }
            header('Location: index.php');
            break;
        case 'post':
            include "site/post.php";
            break;
        case 'like':
            include "site/like.php";
            break;
        case 'contact':
            include "site/contact.php";
            break;
        default:
            break;
    }
} else {
    include "site/home.php";
}
include "site/footer.php";
