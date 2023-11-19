<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HYU SHOP</title>
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
                        <h1 class="form-title">Đăng nhập</h1>
                        <form action="index.php?act=login" class="register-form" method="post">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" id="username" name="user" placeholder="Nhập tài khoản" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" name="pass" placeholder="Nhập mật khẩu..." />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ tài khoản
                                </label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="dangnhap" class="form-submit" value="Đăng nhập" />
                            </div>
                            <h4 style="color:red">
                                <?php
                                if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                                    echo $_SESSION['tb_dangnhap'];
                                    unset($_SESSION['tb_dangnhap']);
                                }

                                ?>
                            </h4>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Hoặc đăng nhập với</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
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