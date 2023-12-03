<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <form action="index.php?act=billcomform" method="post">

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
            <?php showcart(0, true); ?>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="pttt" value="1" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="pttt" value="2" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Ngân hàng</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="pttt" value="3" id="paypal">
                            <label class="custom-control-label" for="paypal">Momo</label>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3" name="dongydathang" value="Đặt hàng">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Checkout End -->