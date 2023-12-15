<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="content/img/R.png" rel="icon">
    <link rel="stylesheet" href="content/lg/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="content/lg/css/style.css">
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






    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="content/lg/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php?act=dangky" class="signup-image-link">Chưa có tài khoản?</a>
                    </div>

                    <div class="signin-form">
                        <h1 class="form-title">Nhập mật khẩu mới</h1>
                        <tr>
                            <?php if (isset($error['fail'])): ?>
                                <div class="alert alert-primary" role="alert">
                                    <?= $error['fail'] ?>
                                </div>
                            <?php elseif (isset($error['success'])): ?>
                                <div class="alert alert-primary" role="alert">
                                    <?= $error['success'] ?>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-primary" role="alert">
                                    Đổi mật khẩu mới tại đây
                                </div>
                            <?php endif; ?>
                        </tr>


                        <form action="" class="register-form" method="post">
                            <div class="form-group">
                                <input type="password" name="newpass" class="control-login" value="<?php if (isset($_POST['newpass']))
                                    echo $_POST['newpass'] ?>" placeholder="Nhập mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="repass" class="control-login" value="<?php if (isset($_POST['repass']))
                                    echo $_POST['repass'] ?>" placeholder="Nhập lại mật khẩu">
                                </div>


                                <div class="form-group form-button">
                                    <button class=" form-submit" type="submit" name="submit">Gửi</button>

                                </div>
                                <a href="index.php?act=dangnhap">Quay về trang đăng nhập</a>
                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>