<?
include './model/banner.php';
$dssp_noibat = loadall_sanpham_noibat();
$dssp_hot =  loadall_sanpham_hot();


// Make sure $listbanner is defined even if it's empty
$listbanner = loadall_banner();

?>


<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    foreach ($listbanner as $banner) {
                        extract($banner);

                        $img = $img_path . $img;

                    ?>
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="<?php echo $img; ?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?php echo $text1; ?></h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?php echo $text2; ?></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="index.php?act=shop">Mua ngay</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="content/img/iphone-14-pro-1660186222336.webp" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiết kiệm 20%</h6>
                    <h3 class="text-white mb-3">Giảm giá đặc biệt</h3>
                    <a href="shop.php" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="content/img/8458.png" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiết kiệm 20%</h6>
                    <h3 class="text-white mb-3">Giảm giá đặc biệt</h3>
                    <a href="shop.php" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí ship</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14 ngày đổi hàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->

<!-- Categories End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm nổi bật</span></h2>
    <div class="row px-xl-5">
        <?php
        foreach ($dssp_noibat as $sp) {
            extract($sp);
            $linksp = "index.php?act=detail&idsp=" . $sp['id'];
            $img = $img_path . $img;

        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= $img ?>" alt="<?php echo $name; ?>">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="<?= $linksp ?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="<?php echo $linksp; ?>"><?php echo $name; ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo number_format($price, 0, '.', '.'); ?>đ</h5>
                         
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
               
                        </div>
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <input type="hidden" name="soluong" value="1">
                            <input class="btn btn-primary px-3" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                        </form>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Products End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="content/img/capture-decran-2018-09-12-a-21-53-13.png" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiết kiệm 20%</h6>
                    <h3 class="text-white mb-3">Giảm giá đặc biệt</h3>
                    <a href="site/shop.php" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="content/img/dien-thoai-samsung-dong-A-moi-nhat.png" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Tiết kiệm 20%</h6>
                    <h3 class="text-white mb-3">Giảm giá đặc biệt</h3>
                    <a href="site/shop.php" class="btn btn-primary">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm HOT</span></h2>
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel" data-items="4">
                    <?php
                    foreach ($dssp_hot as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=detail&idsp=" . $id;
                        $img = $img_path . $img;
                    ?>
                        <div class="item">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $img ?>" alt="<?php echo $name; ?>">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="<?= $linksp ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="<?php echo $linksp; ?>"><?php echo $name; ?></a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5><?php echo number_format($price, 0, '.', '.'); ?>đ</h5>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                          
                                    </div>
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <input type="hidden" name="name" value="<?= $name ?>">
                                        <input type="hidden" name="img" value="<?= $img ?>">
                                        <input type="hidden" name="price" value="<?= $price ?>">
                                        <input type="hidden" name="soluong" value="1">
                                        <input class="btn btn-primary px-3" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Products End -->
            </div>
        </div>
    </div>
</div>

<!-- Vendor End -->