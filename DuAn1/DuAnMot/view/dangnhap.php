<style>

.quenmka a{
    display: inline-block; /* Chuyển thành inline-block để nó nằm trong dòng và có thể đặt width và height */
    margin-top: 10px; /* Khoảng cách từ phía trên để nằm dưới input */
    margin-left: 305px; /* Khoảng cách từ phía trái */
}

</style>
<?php

?>
<div class="containerfull">
<div><img  style="text-align: center; width:100%; height:250px" src="../view/img/headergalaxy.jpg" alt=""></div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="#">Cập nhật thông tin</a>
            <a href="#">Lịch sử mua hàng</a>
            <a href="#">Thoát hệ thống</a>
        </div>
        <div class="boxright">
            <h1>ĐĂNG NHẬP</h1><br>
            <div class="containerfull mr30">
                <h2 style="color:red">
                    <?php
                    if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                        echo $_SESSION['tb_dangnhap'];
                        unset($_SESSION['tb_dangnhap']);
                    }

                    ?>
                </h2>
                <form action="index.php?act=login" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="username" name="user" placeholder="Nhập tên đi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="password">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                            <input type="password" id="password" name="pass" placeholder="Nhập mật khẩu..">
                        </div>
                    </div>
                    <br>
                   <div class="quenmka">
                   <a  href="index.php?act=quenmk">Quên mật khẩu</a>
                   </div>
                 

                    </div>


                    <br>
                    <div class="row">
                        <input type="submit" name="dangnhap" value="Đăng nhập">
                    </div>
                </form>

            </div>
        </div>


    </div>
</section>


<!-- <?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
?>

    <div class="row mb10">
        Xin chào <br>
        <?= $user ?>
    </div>
    <div class="row mb10">
        <li>
            <a href="index.php?act=mybill">Đơn hàng của tôi</a>
        </li>
        <li>
            <a href="index.php?act=quenmk">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
        </li>

        <?php
        if ($role == 1) {
        ?>
            <li>
                <a href="admin/index.php">Đăng nhập Admin</a>
            </li>

        <?php } ?>
        <li>
            <a href="index.php?act=dangxuat">Đăng xuất</a>
        </li>
    </div>


<?php
} else {



?>
    <form action="index.php?act=dangnhap" method="post">
        <div class="row mb10">
            Tên đăng nhập <br>
            <input type="text" name="user">
        </div>
        <div class="row mb10">
            Mật khẩu <br>
            <input type="password" name="pass"><br>
        </div>
        <div class="row mb10">
            <input type="checkbox" name="">Ghi nhớ tài khoản? <br>
        </div>
        <div class="row mb10">
            <input type="submit" value="Đăng nhập" name="dangnhap">

        </div>
    </form>
    <li>
        <a href="">Quên mật khẩu</a>
    </li>
    <li>
        <a href="index.php?act=dangky">Đăng ký tài khoản</a>
    </li>
<?php } ?> -->