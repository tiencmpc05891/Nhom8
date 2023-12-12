<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/post.php";
include "global.php";
include "site/header.php";
include "site/navmenu.php";


$dsdm = loadall_danhmuc();
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "site/home.php";
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
        case 'shop':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_POST['iddm']) && ($_POST['iddm'] > 0)) {
                $iddm = $_POST['iddm'];
            } else {
                $iddm = 0;
                $loi = "Không có sản phẩm nào khớp!";
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "site/shop.php";
            break;
        case 'addtocart':
            if (!isset($_SESSION['user'])) {
                header("Location: index.php?act=dangnhap");
                exit();
            }
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include 'site/cart.php';
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                if (isset($_SESSION['mycart'][$idcart])) {
                    // Xóa mục cụ thể khỏi giỏ hàng
                    array_splice($_SESSION['mycart'], $idcart, 1);
                }
            } else {
                // Nếu không có tham số idcart, xóa toàn bộ giỏ hàng
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=cart');
            break;
        case 'billcomform':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();

                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id'];
                } else {
                    $iduser = 0; // Hoặc một giá trị khác đại diện cho người dùng không đăng nhập
                }

                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);

                // Kiểm tra và xử lý chi tiết đơn hàng
                if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($iduser, $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
                    // Xóa giỏ hàng của người dùng
                    $_SESSION['mycart'] = [];
                }
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "site/billcomform.php";
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

                // Kiểm tra không để trống
                if (empty($user) || empty($pass) || empty($email)) {
                    $error_message = 'Vui lòng nhập tên đăng nhập, mật khẩu hoặc email, nếu bạn để trống! ';
                } elseif (preg_match('/[^\p{L}\d\s]/u', $user)) {
                    $error_message = 'Tên đăng nhập không được chứa ký tự đặc biệt.';
                } elseif (strlen($pass) < 4) {
                    $error_message = 'Mật khẩu phải có ít nhất 4 ký tự.';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_message = 'Địa chỉ email không hợp lệ.';
                } elseif (email_exists($email) || username_exists($user)) {
                    $_SESSION['tb_dangky'] = 'Tài khoản hoặc email đã tồn tại. Vui lòng chọn tài khoản hoặc email khác.';
                    $_SESSION['input_values'] = array('email' => $email, 'user' => $user);
                    header('location: index.php?act=dangky');
                    exit;
                } else {
                    // Thực hiện đăng ký nếu không có lỗi
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = 'Đã đăng ký thành công. Mời bạn đăng nhập!';
                    header('location: index.php?act=dangnhap');
                }

                if (isset($error_message) && $error_message != "") {
                    $_SESSION['tb_dangky'] = $error_message;
                    $_SESSION['input_values'] = array('email' => $email, 'user' => $user);
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
            $listbaiviet = loadall_baiviet();
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
