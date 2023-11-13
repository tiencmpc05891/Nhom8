<?php
if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
   extract($_SESSION['user']);
}
?>
<?php
if (isset($_SESSION['user'])) {
   extract($_SESSION['user']);
}
?>

<div class="containerfull">
   <div><img style="text-align: center; width:100%; height:250px" src="../view/img/headergalaxy.jpg" alt=""></div>
</div>

<section class="containerfull">
   <div class="container">
      <div class="boxleft mr2pt menutrai">
         <h1>Xin Chào <?= $user ?></h1><br><br>
         <a href="#">Cập nhật thông tin</a>
         <?php if ($role == 1) { ?>
            <a href="admin/index.php">Đăng nhập Admin</a>
         <?php } ?>
         <a href="index.php?act=mybill">Xem đơn hàng</a>

         <a href="index.php?act=dangxuat">Thoát hệ thống</a>
      </div>
      <div class="boxright">
         <h1>Thông tin tài khoản</h1><br>
         <div class="containerfull mr30">
            <form action="index.php?act=mytaikhoan" method="post">
               <div class="row">
                  <div class="col-25">
                     <label for="username">Tên đăng nhập</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="username" value="<?= $user ?>" name="user" placeholder="Nhập tên đi">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <label for="password">Mật khẩu</label>
                  </div>
                  <div class="col-75">
                     <input type="password" id="password" value="<?= $pass ?>" name="pass" placeholder="Nhập mật khẩu..">
                  </div>
               </div>


               <div class="row">
                  <div class="col-25">
                     <label for="email">Email</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="email" value="<?= $email ?>" name="email" placeholder="Nhập email..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <label for="email">Địa chỉ</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="diachi" value="<?= $address ?>" name="address" placeholder="Nhập địa chỉ..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <label for="email">Điện thoại</label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="dienthoai" value="<?= $tel ?>" name="tel" placeholder="Nhập số điện thoại..">
                  </div>
               </div>


               <br>
               <div class="row">
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <input type="submit" name="capnhat" value="Cập nhật">
               </div>
            </form>

         </div>
      </div>


   </div>
</section>