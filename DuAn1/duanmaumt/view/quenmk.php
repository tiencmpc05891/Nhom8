<!-- <div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">

            <div class="boxtieude">Quên mật khẩu</div>
            <div class="row boxcontent formtaikhoan">

                <form action="index.php?act=quenmk" method="post">
                    <div class="row mb10">
                        Email
                        <input type="email" name="email">
                    </div>
                
                    <div class="row mb10">
                        <input type="submit" value="Gửi" name="guiemail">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>
                <h2 class="thongbao">


                    <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }

                    ?>
                </h2>
            </div>

        </div>

    </div>


</div> -->
<?php

?>
<div class="containerfull">
    <div><img style="text-align: center; width:100%; height:250px" src="../view/img/headergalaxy.jpg" alt=""></div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="#">Cập nhật thông tin</a>
            <a href="#">Đăng nhập Admin</a>
            <a href="#">Thoát hệ thống</a>
        </div>
        <div class="boxright">
            <h1>Quên mật khẩu</h1><br>
            <div class="containerfull mr30">
                <h2 style="color:red">
                    <?php
                    if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                        echo $_SESSION['tb_dangnhap'];
                        unset($_SESSION['tb_dangnhap']);
                    }

                    ?>
                </h2>

                <form action="index.php?act=quenmk" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                            <input style="  padding: 12px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                resize: vertical;" type="email" name="email" placeholder="Nhập email">
                        </div>
                    </div>
                  
                        <?php

                        if (isset($thongbao) && ($thongbao != "")) {
                            echo $thongbao;
                        }

                        ?>
                 
                    <div class="row">



                        <br>
                        <div class="row">
                            <input type="submit" value="Gửi" name="guiemail">
                        </div>
                </form>

            </div>
        </div>


    </div>
</section>