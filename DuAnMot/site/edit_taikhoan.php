<style>
    .right-side {
        margin: 0 auto;
        /* Canh giữa */
        max-width: 600px;
        /* Độ rộng tối đa */
    }

    .form-group {
        margin-bottom: 15px;
    }

    h1 {
        text-align: center;
    }

    label {
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .update-success {
        color: green;
        font-weight: bold;
    }

    .password-container {
        position: relative;
    }

    .field-icon {
        position: absolute;
        right: 23px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .thongbao {
        color: red;
    }
</style>
<h1 style="text-align: center;">Xin chào <?= $user ?></h1><br><br>
<div class="right-side">
    <h1>Cập nhật tài khoản</h1><br>
    <?php
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        extract($_SESSION['user']);
    }
    ?>
    <form action="index.php?act=edit_taikhoan" method="post">
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Tài khoản</label>
            <div class="col-sm-10">
                <input type="text" id="username" value="<?= $user ?>" name="user" class="form-control" placeholder="Nhập tên đi">

            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10 password-container">
                <input type="password" id="password" value="<?= $pass ?>" name="pass" class="form-control" placeholder="Password">
                <span id="togglePassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" id="email" value="<?= $email ?>" name="email" class="form-control" placeholder="Nhập email..">
            </div>
        </div>
        <div class="form-group row">
            <label for="diachi" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input type="text" id="diachi" value="<?= $address ?>" name="address" class="form-control" placeholder="Nhập địa chỉ..">
            </div>
        </div>
        <div class="form-group row">
            <label for="dienthoai" class="col-sm-2 col-form-label">SĐT</label>
            <div class="col-sm-10">
                <input type="text" id="dienthoai" value="<?= $tel ?>" name="tel" class="form-control" placeholder="Nhập số điện thoại..">
            </div>
        </div>



        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Cập nhật" name="capnhat" class="btn btn-block btn-primary font-weight-bold py-3">
    

        <br>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#togglePassword").click(function() {
            var passwordField = $("#password");
            var passwordFieldType = passwordField.attr("type");

            if (passwordFieldType === "password") {
                passwordField.attr("type", "text");
            } else {
                passwordField.attr("type", "password");
            }
        });
    });
    //con mắt trong mật khẩu
</script>
