<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstopsp = loadall_sanpham_topsp();


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':

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

            include "view/sanpham.php";
            break;
        case 'sanphamct':

            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);

                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }

            break;
            // case 'sanphamchitiet':
            //     $dsdm = danhmuc_all();
            //     if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
            //         $id = $_GET["id"];
            //         $iddm = get_iddm($id);
            //         $dssp_lienquan = get_dssp_lienquan($iddm, $id, 4);
            //         $spchitiet = get_sanphamchitiet($id);
            //         include "view/sanphamchitiet.php";
            //     } else {
            //         include "view/home.php";
            //     }



            //     break;
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];


                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đã đăng ký thành công. Mời bạn đăng nhập!";
                    header("location: index.php?act=dangnhap");
                }
                include "view/dangky.php";
                break;
        // case 'dangky':
        //     if (isset($_POST['dangky']) && ($_POST['dangky'])) {
        //         $email = $_POST['email'];
        //         $user = $_POST['user'];
        //         $pass = $_POST['pass'];

        //         $thongbao = ""; // Khởi tạo thông báo

        //         // Kiểm tra các điều kiện
        //         if (empty($user) || empty($pass) || empty($email)) {
        //             $thongbao = "Vui lòng điền đầy đủ thông tin.";
        //         } elseif (!preg_match("/^[a-zA-Z ]*$/", $user)) {
        //             $thongbao = "Tên đăng nhập chỉ được chứa chữ cái và khoảng trắng.";
        //         } elseif (strlen($pass) < 3) {
        //             $thongbao = "Mật khẩu phải có ít nhất 3 ký tự.";
        //         } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //             $thongbao = "Email không đúng định dạng.";
        //         } else {
        //             // Nếu không có lỗi, thực hiện thêm tài khoản vào cơ sở dữ liệu
        //             insert_taikhoan($email, $user, $pass);
        //             $thongbao = "Đã đăng ký thành công. Mời bạn đăng nhập!";
        //             header("location: index.php?act=dangnhap");
        //         }
        //     }
        //     include "view/dangky.php";
        //     break;


        
        case 'login':
            // input
            if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])) {
                $user = $_POST["user"];
                $pass = $_POST["pass"];

                //xl: kiem tra
                $kq = checkuser($user, $pass);
                if (is_array($kq) && (count($kq))) {
                    $_SESSION['user'] = $kq;
                    header('location: index.php');
                } else {
                    $tb = "Tài khoản không tồn tại hoặc thông tin đăng nhập sai! ";
                    $_SESSION['tb_dangnhap'] = $tb;
                    header('location: index.php?act=dangnhap');
                }
                //out
            }
            break;
        case 'dangnhap':

            include "view/dangnhap.php";
            break;
            // case 'dangnhap':
            //     if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            //         $user = $_POST['user'];
            //         $pass = $_POST['pass'];
            //         $checkuser = checkuser($user, $pass);
            //         if (is_array($checkuser)) {
            //             $_SESSION['user'] = $checkuser;
            //             // $thongbao = "Bạn đã đăng nhập thành công!";
            //             header('Location: index.php');
            //         } else {
            //             $thongbao = "Đăng nhập không đúng. Vui lòng đăng nhập lại!  Hoặc tạo tài khoản mới!";
            //             header('location: index.php?act=dangnhap');
            //         }
            //     }
            //     include "view/dangnhap.php";
            //     break;
        case 'mytaikhoan':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {

                include "view/mytaikhoan.php";
            }
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
                header('Location: index.php?ac=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view//quenmk.php";
            break;
        case 'dangxuat':
            if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
                unset($_SESSION['user']);
            }
            header('Location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price,  $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }

            include "view/cart/viewcart.php";

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
            header('Location: index.php?act=viewcart');
            break;

        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
            // case 'billcomform':

            //     if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
            //         if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
            //         else $id = 0;
            //         $name = $_POST['name'];
            //         $email = $_POST['email'];
            //         $address = $_POST['address'];
            //         $tel = $_POST['tel'];
            //         $pttt = $_POST['pttt'];
            //         $ngaydathang = date('h:i:sa d/m/Y');
            //         $tongdonhang = tongdonhang();
            //         $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);

            //         //insert into cart : $session['mycart] & idbill

            //         foreach ($_SESSION['mycart'] as $cart) {
            //             insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
            //         }
            //         $_SESSION['cart'] = [];
            //     }
            //     $bill = loadone_bill($idbill);
            //     $billct = loadall_cart($idbill);
            //     include "view/cart/billcomform.php";
            //     break;
            //không cần đăng nhập
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
            include "view/cart/billcomform.php";
            break;

        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
