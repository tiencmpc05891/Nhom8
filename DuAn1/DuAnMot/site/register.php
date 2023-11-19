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
    <!-- Topbar Start -->
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h1 class="form-title">Đăng ký</h1>
                        <form action="index.php?act=register" method="post" class="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <!-- <input type="text" id="username" name="user" placeholder="Nhập tài khoản..."> -->
                                <input type="text" id="username" value="<?= isset($_SESSION['input_values']['user']) ? htmlspecialchars($_SESSION['input_values']['user']) : '' ?>" name="user"  placeholder="Nhập tài khoản">

                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" name="pass" placeholder="Nhập mật khẩu..." />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <!-- <input type="email" id="email" name="email" placeholder="Nhập email..."> -->
                                <input type="text" id="email" value="<?= isset($_SESSION['input_values']['email']) ? htmlspecialchars($_SESSION['input_values']['email']) : '' ?>" name="email" placeholder="Nhập email..">

                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý
                                    với điều khoản <a href="#" class="term-service"></a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="dangky" class="form-submit" value="Đăng ký" />
                            </div>
                            <h4 style="color:red">
                                <?php
                                if (isset($_SESSION['tb_dangky']) && ($_SESSION['tb_dangky'] != "")) {
                                    echo $_SESSION['tb_dangky'];
                                    unset($_SESSION['tb_dangky']);
                             
                                }
                    
                                ?>
                            </h4>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="content/lg/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php?act=dangnhap" class="signup-image-link">Tôi đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>