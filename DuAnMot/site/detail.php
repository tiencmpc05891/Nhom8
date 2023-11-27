<?php

if (isset($titlepage) && $titlepage != "") {
    $title = $titlepage;
} else {
    $title = "Sản Phẩm";
}

// Lấy danh mục sản phẩm và sản phẩm cụ thể dựa trên tham số từ URL (nếu có)
$iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 1;
$dssp = loadall_sanpham("", $iddm);

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-xr3BwpeUybeUv2xO58W3CyCeei60yC02gYvVeGGso2RP5o2fFdy6MDccbg/A4xH9PW4Hg/Gg5A3IOdU+IbFvAA==" crossorigin="anonymous" />
<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <?php

                        extract($onesp);
                        $img = $img_path . $img;
                        echo '<img src="' . $img . '" > <br>';

                        ?>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?= $name ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(1,5k Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4"><input type="hidden" name="price"><?= number_format($price, 0, '.', '.'); ?><sup>đ</sup>
                    <del class="text-muted ml-2"><?= number_format($price, 0, '.', '.'); ?><sup>đ</sup></del>
                </h3>


                <p class="mb-4"></p>

                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Màu sắc:</strong>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" name="color">
                        <label class="custom-control-label" for="color-1">Đen</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-2" name="color">
                        <label class="custom-control-label" for="color-2">Trắng</label>
                    </div>
                </div>
                <div class="d-flex align-items-center ">
                    <div class="d-flex align-items-center quantity-form">
                        <form action="index.php?act=addtocart" method="post">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary quantity-btn quantity-minus" onclick="decrement()">-</button>
                                </div>
                                <input style="margin-left: 7px;" type="number" name="soluong" min="1" max="10" value="1" class="quantity-field">
                                <div class="input-group-btn">
                                    <button style="    margin-block: -37px;float: right;margin-left: 104px;" type="button" class="btn btn-primary quantity-btn quantity-plus" onclick="increment()">+</button>
                                </div>
                                <input type="hidden" name="img" value="<?= $img ?>">
                                <input type="hidden" name="name" value="<?= $name ?>">
                                <input type="hidden" name="price" value="<?= $price ?>">
                            </div>
                            <input style="margin-top:-63px; margin-left:150px;" class="btn btn-primary px-3" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Chia sẻ:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Thông tin</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Mô tả</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Thông tin sản phẩm</h4>
                        <p><?= $thongtin ?></p>
                        <p></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Mô tả</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        <?= $mota ?>
                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">

                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                    <li class="list-group-item px-0">

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Product Name"</h4>
                                <div class="media mb-4">
                                    <img src="content/img/iphone-11-trang-600x600.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                            ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                            ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked
                                    *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bạn có
            thể thích</span></h2>

    <div class="row px-xl-5">

        <?php

        foreach ($sp_cung_loai as   $spcl) {
            extract($spcl);
            $linksp = "index.php?act=detail&idsp=" . $id;
            $img = $img_path . $img;
        ?>
            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <a href="<?= $linksp ?>">
                            <img class="img-fluid w-100" src="<?= $img ?>" alt="">
                        </a>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="<?= $linksp ?>"><i class="fa fa-search"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="<?= $linksp ?>"><?= $name ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?= number_format($price, 0, '.', '.'); ?><sup>đ</sup></h5>
                            <h6 class="text-muted ml-2"><del><?= number_format($price, 0, '.', '.'); ?><sup>đ</sup></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(1,5k)</small>
                        </div>
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= number_format($price, 0, '.', '.'); ?>">
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
<script>
    function increment() {
        var quantityField = document.querySelector('.quantity-field');
        var currentValue = parseInt(quantityField.value);
        var maxValue = parseInt(quantityField.getAttribute('max'));

        if (currentValue < maxValue) {
            quantityField.value = currentValue + 1;
        }
    }

    function decrement() {
        var quantityField = document.querySelector('.quantity-field');
        var currentValue = parseInt(quantityField.value);
        var minValue = parseInt(quantityField.getAttribute('min'));

        if (currentValue > minValue) {
            quantityField.value = currentValue - 1;
        }
    }
</script>