<?php

if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
    extract($_SESSION['user']);

    $html_account = '<a href="index.php?act=mytaikhoan"><button class="dropdown-item" type="button">Trang cá nhân :  ' . $user . '</button></a>
    <a href="index.php?act=edit_taikhoan"><button class="dropdown-item" type="button">Cập nhật thông tin</button></a>
    <a href="index.php?act=mybill"><button class="dropdown-item" type="button">Đơn hàng của tôi</button></a>';

    // Kiểm tra quyền của người dùng
    if ($role == 1) {
        $html_account .= '<a href="admin/index.php"><button class="dropdown-item" type="button">Đăng nhập Admin</button></a>';
    }

    $html_account .= '<a href="index.php?act=dangxuat"><button class="dropdown-item" type="button">Đăng xuất</button></a>';
} else {
    $html_account = '<a href="index.php?act=dangnhap"><button class="dropdown-item" type="button">Đăng nhập</button></a>
    <a href="index.php?act=dangky"><button class="dropdown-item" type="button">Đăng ký</button></a>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HYU SHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="content/img/R.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="content/lib/animate/animate.min.css" rel="stylesheet">
    <link href="content/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="content/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Về chúng tôi</a>
                    <a class="text-body mr-3" href="">Liên hệ</a>
                    <a class="text-body mr-3" href="">Hỗ trợ</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg> <?= isset($user) ? $user : '' ?>
                            <!--  toán tử ba ngôi (isset($user) ? $user : '') 
                            để kiểm tra xem biến $user có tồn tại không. 
                            Nếu tồn tại, thì sẽ hiển thị tên người dùng, ngược lại sẽ hiển thị một chuỗi trống. 
                            -->
                        </button>


                        <div class="dropdown-menu dropdown-menu-right">
                            <?= $html_account; ?>
                        </div>
                    </div>

                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Hyu</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm sản phẩm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Liên hệ ngay</p>
                <h5 class="m-0">+987654321</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->