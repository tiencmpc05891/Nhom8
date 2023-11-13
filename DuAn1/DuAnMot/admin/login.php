<body class="bg-gray-200">
    <div class="main-content  mt-0">
        <main class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="username" placeholder="Username" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>

                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="index.php?act=home" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                    <p class="mt-4 text-sm text-center">
                                        <?php
                                        // Kiểm tra nếu có lỗi, hiển thị thông báo
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            if (empty($_POST['username']) && empty($_POST['password'])) {
                                                echo 'Vui lòng nhập tên đăng nhập và mật khẩu.';
                                            } elseif (empty($_POST['username'])) {
                                                echo 'Vui lòng nhập tên đăng nhập.';
                                            } elseif (empty($_POST['password'])) {
                                                echo 'Vui lòng nhập mật khẩu.';
                                            } else {
                                                // Xử lý đăng nhập và kiểm tra tài khoản
                                                $user = new user();
                                                $username = $_POST['username'];
                                                $password = $_POST['password'];

                                                if ($user->checkUser($username, $password)) {
                                                    $result = $user->userid($username, $password);
                                                    $_SESSION['admin'] = $username;
                                                    // Chuyển hướng về trang home sau khi đăng nhập thành công
                                                    header("Location: index.php?act=newhome");
                                                   
                                                } else {
                                                    echo 'Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng thử lại.';
                                                }
                                               
                                            }
                                        }
                                        ?>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>


<!-- bản gốc -->