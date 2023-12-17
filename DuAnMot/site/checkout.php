<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <form id="checkoutForm" action="index.php?act=billcomform" method="post">

                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin đặt hàng</span></h5>
                <?php
                if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                    $address = $_SESSION['user']['address'];
                    $email = $_SESSION['user']['email'];
                    $tel = $_SESSION['user']['tel'];
                } else {
                    $user = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" name="name" value="<?= $user ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="<?= $email ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="tel" value="<?= $tel ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" value="<?= $address ?>">
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Sản phẩm đặt hàng</span></h5>

            <?php
            // Kiểm tra xem giỏ hàng có sản phẩm hay không
            if (sizeof($_SESSION['mycart']) > 0) {
                showcart(0, true);
            ?>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" value="1" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>


                    </div>

                    <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3" name="dongydathang" value="Đặt hàng">



                    </form>
                </div>
                <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="index.php?act=online">

                    <a href="https://test-payment.momo.vn/v2/gateway/pay?t=TU9NT0JLVU4yMDE4MDUyOXxPRDE3MDI3MTM2OTk2NjM&s=5fb7344500bac11e510b23528bb3bf94955fee9a4083e4c62675d8a12074887f">
                        <input class="btn btn-danger" type="button" class="hidden" value="Thanh toán MoMo" />
                    </a>

                    <button type="submit" name="redirect" class="btn btn-danger">VN PAY</button>
                </form>
            <?php
            } else {
                // Nếu không có sản phẩm trong giỏ hàng, hiển thị thông báo
                echo '<div class="alert alert-warning" role="alert">Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</div>';
            }
            ?>

        </div>
    </div>

</div>

<!-- Checkout End -->