<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "../model/post.php";
include "head.php";

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    // Lấy thông tin về quyền (role) từ session
    $role = $_SESSION['user']['role'];

    include "nav.php"; // Đảm bảo nav được hiển thị khi người dùng đã đăng nhập

    if (isset($_GET['act'])) {
        $act = $_GET['act'];

        // Kiểm tra quyền của người dùng
        if ($role !== '1') {
            // Nếu không phải admin, chuyển hướng về trang đăng nhập
            header('location: index.php?act=login');
            exit();
        }
        // Xử lý các case còn lại
        switch ($act) {
            case 'home':
                include "home.php";
                break;
            case 'adddm':
                //kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $sql = "select * from danhmuc order by id desc";
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'addsp':
                //kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $thongtin = $_POST['thongtin'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file"
                        //     . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "has been uploade.";
                    } else {
                        // echo "Xin lỗi không thể upload file";
                    }
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $thongtin, $iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
                // $sql = "select * from danhmuc order by id desc";
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw, $iddm);
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $thongtin = $_POST['thongtin'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file"
                        //     . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "has been uploade.";
                    } else {
                        // echo "Xin lỗi không thể upload file";
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $thongtin, $hinh);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham();
                include "sanpham/list.php";
                break;
            /////
            case 'addbv':
                //kiểm tra xem người dùng có click vào nút add hay không
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $img = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {

                    } else {

                    }
                    insert_baiviet($tieude, $noidung, $img);
                    $thongbao = "Thêm thành công";
                }
                $listbaiviet = loadall_baiviet();
                include "post/add.php";
                break;

            case 'listbv':
                $listbaiviet = loadall_baiviet();
                include "post/list.php";
                break;
            case 'xoabv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_baiviet($_GET['id']);
                }
                $listbaiviet = loadall_baiviet();
                include "post/list.php";
                break;
            case 'suabv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $baiviet = loadone_baiviet($_GET['id']);
                }
                $listbaiviet = loadall_baiviet();
                include "post/update.php";
                break;
            case 'updatebv':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $img = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file"
                        //     . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "has been uploade.";
                    } else {
                        // echo "Xin lỗi không thể upload file";
                    }
                    update_baiviet($id, $tieude, $noidung, $img);
                    $thongbao = "Cập nhật thành công";
                }
                $listbaiviet = loadall_baiviet();

                include "post/list.php";
                break;
            /////


            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'updatetk':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id = $_POST['id'];
                    update_taikhoan($id, $user, $pass, $email, $address, $tel);
                    $thongbao = "Cập nhật thành công";
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'suatk':
                $user = '';
                $pass = '';
                $email = '';
                $address = '';
                $tel = '';

                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $taikhoan = loadone_taikhoan($_GET['id']);
                    if ($taikhoan) {
                        $user = $taikhoan['user'];
                        $pass = $taikhoan['pass'];
                        $email = $taikhoan['email'];
                        $address = $taikhoan['address'];
                        $tel = $taikhoan['tel'];
                    }
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/update.php";
                break;
            case 'xoatk':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dsbl':
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'thongke':
                $listthongke = loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listthongke = loadall_thongke();
                include "thongke/bieudo.php";
                break;
            case 'listbill':
                if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listbill = loadall_bill($kyw);
                include "bill/listbill.php";
                break;
            case 'xoadh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_donhang($_GET['id']);
                }
                $listbill = loadall_bill();
                include "bill/listbill.php";
                break;
            case 'logout':
                // Thêm thông báo nếu cần
                // ...
                // Xử lý đăng xuất
                unset($_SESSION['user']);
                header('location: login.php');
                exit();
            default:
                include "home.php";
                break;
        }
    } else {
        // Mặc định khi không có hành động cụ thể
        include "home.php";
    }

    include "footer.php"; // Đảm bảo footer được hiển thị khi người dùng đã đăng nhập
} else {
    // Người dùng chưa đăng nhập
    // Kiểm tra đăng nhập
    if (isset($_POST["dangnhap"]) && $_POST["dangnhap"]) {
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        if (empty($user) || empty($pass)) {
            $error_message = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
        } else {
            // Thực hiện xác thực đăng nhập
            $kq = checkuser($user, $pass);

            if (is_array($kq) && count($kq)) {
                $_SESSION['user'] = $kq;

                // Chuyển hướng người dùng sau khi đăng nhập thành công
                if ($_SESSION['user']['role'] === '1') {
                    header('location: index.php');
                }
            } else {
                $error_message = "Tài khoản không có quyền quản trị hoặc thông tin đăng nhập sai!";
            }
        }

        // Kiểm tra nếu có lỗi, lưu thông báo lỗi vào session và chuyển hướng về trang đăng nhập
        if (isset($error_message) && $error_message != "") {
            $_SESSION['tb_dangnhap'] = $error_message;
            header('location: index.php?act=login');
            exit();
        }
    }

    // Hiển thị trang đăng nhập
    include "login.php";
}
