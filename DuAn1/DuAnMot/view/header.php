<?php

if(isset($_SESSION['user'])&&(count($_SESSION['user'])>0)){
    extract($_SESSION['user']);
    $html_account='<a href="index.php?act=mytaikhoan">'.$user.'</a>
    <a href="index.php?act=dangxuat">Thoát</a>';

}else{
    $html_account='<a href="index.php?act=dangky">ĐĂNG KÝ</a>
    <a href="index.php?act=dangnhap">ĐĂNG NHẬP</a>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Min T</title>
    <link rel="stylesheet" href="view/css/style1.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>
 <header>
    <div class="containerfull padd20">
        <div class="container">
            <div class="logo col2"><img src="../view/img/logoasm1-removebg-preview.png" height="100px" alt=""></div>
            <div class="menu col8">
                <div class="col3">
                    <form action="index.php?act=sanpham" method="post">
                        <input type="text" name="kyw" id="" placeholder="Nhập từ khóa tìm kiếm theo tên">
                        <input type="submit" name="kyw" value="Tìm kiếm">
                    </form>
                </div>
                <div class="col9">
                    <a href="index.php">Trang Chủ</a>
                    <a href="index.php?act=sanpham">Sản Phẩm</a>
                    <a href="index.php?act=lienhe">Liên hệ</a>
                    <?=$html_account;?>
                    <a href="index.php?act=viewcart">Giỏ Hàng</a>

                </div>


            </div>
        </div>
    </div>
    </header>