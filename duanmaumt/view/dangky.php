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
         <a href="#">Lịch sử mua hàng</a>
         <a href="#">Thoát hệ thống</a>
      </div>
      <div class="boxright">
         <h1>ĐĂNG KÝ</h1><br>
         <div class="containerfull mr30">
            <form action="index.php?act=dangky" method="post">
               <div class="row">
                  <div class="col-25">
                     <label for="username">Tên đăng nhập</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="username" name="user" placeholder="Nhập tài khoản...">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <label for="password">Mật khẩu</label>
                  </div>
                  <div class="col-75">
                     <input type="password" id="password" name="pass" placeholder="Nhập mật khẩu...">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <label for="repassword">Nhập lại mật khẩu</label>
                  </div>
                  <div class="col-75">
                     <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu...">
                  </div>
               </div>

               <div class="row">
                  <div class="col-25">
                     <label for="email">Email</label>
                  </div>
                  <div class="col-75">
                     <input type="email" id="email" name="email" placeholder="Nhập email...">
                  </div>
               </div>


               <br>
               <div class="row">

                  <input type="submit" name="dangky" value="Đăng ký">
               </div>

               <div id="error-message" style="color: red;">
                  <?php if (isset($thongbao) && !empty($thongbao)) {
                     echo $thongbao;
                  } ?>
               </div>
            </form>

         </div>
      </div>


   </div>
</section>