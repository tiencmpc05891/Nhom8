<style>
    .text-dark {
        color: black;
    }

    .notification {
        position: fixed;
        top: 10px;
        right: 10px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        display: none;
        z-index: 9999;
    }

    .success {
        background-color: #4CAF50;
    }
</style>

<?php
$html_dm = showdm($dsdm);


if (isset($titlepage) && $titlepage != "") {
    $title = $titlepage;
} else {
    $title = "Sản Phẩm";
}



$iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 0;
$dssp = loadall_sanpham($kyw, $iddm);

?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>

                <span class="breadcrumb-item active">Sản phẩm</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc theo
                    giá</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">Tất cả giá tiền</label>
                        <span class="badge border font-weight-normal">30</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">0đ - 10.000.000đ</label>
                        <span class="badge border font-weight-normal">10</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">10.000.000đ - 20.000.000đ</label>
                        <span class="badge border font-weight-normal">10</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3">20.000.000đ - 30.000.000đ</label>
                        <span class="badge border font-weight-normal">10</span>
                    </div>

                </form>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Lọc theo
                    loại</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input">
                        <a href="index.php?act=shop" class="custom-control-label" for="price-all">Tất cả loại</a>
                        <span class="badge border font-weight-normal">4</span>
                    </div>
                    <?php foreach ($dsdm as $dm) : ?>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-<?php echo $dm['id']; ?>">
                            <label class="custom-control-label" for="color-<?php echo $dm['id']; ?>">
                                <a class="text-dark" href="index.php?act=shop&iddm=<?php echo $dm['id']; ?>">
                                    <?php echo $dm['name']; ?>
                                </a>
                            </label>
                            <span class="badge border font-weight-normal">10</span>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>

        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                foreach ($dssp as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=detail&idsp=" . $sp['id'];
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
                                <a class="h6 text-decoration-none text-truncate" href="<?= $linksp ?>">
                                    <?= $name ?>
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>
                                        <?= number_format($price, 0, '.', '.'); ?><sup>đ</sup>
                                    </h5>
                             
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
        <div class="col-12">
            <nav>
                <?php
                // Thực hiện truy vấn để đếm tổng số sản phẩm
                $sql_count = "SELECT COUNT(*) as total FROM sanpham";
                $row_count_result = pdo_query_one($sql_count);
                $row_count = $row_count_result['total'];

                // Số sản phẩm muốn hiển thị trên mỗi trang
                $soSanPhamTrenMotTrang = 4;

                // Tính tổng số trang
                $tongSoTrang = ceil($row_count / $soSanPhamTrenMotTrang);

                // Lấy số trang hiện tại từ URL
                $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;

                // Hiển thị nút "Previous"
                $previousPage = max($trangHienTai - 1, 1);
                $previousIddm = $iddm - 1;

                // Hiển thị các liên kết phân trang
                echo '<ul class="pagination justify-content-center">';
                echo '<a class="btn btn-secondary ' . ($trangHienTai == 1 ? 'disabled' : '') . '" href="index.php?act=shop&iddm=' . $previousIddm . '&page=' . $previousPage . '">Previous</a>';

                for ($i = 1; $i <= $tongSoTrang; $i++) {
                    echo '<li class="page-item ' . ($i == $trangHienTai ? 'active' : '') . '">';
                    echo '<a class="page-link" href="index.php?act=shop&iddm=' . $i . '&page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }

                // Hiển thị nút "Next"
                $nextPage = min($trangHienTai + 1, $tongSoTrang);
                $nextIddm = $iddm + 1;

                echo '<a class="btn btn-secondary ' . ($trangHienTai == $tongSoTrang ? 'disabled' : '') . '" href="index.php?act=shop&iddm=' . $nextIddm . '&page=' . $nextPage . '">Next</a>';
                echo '</ul>';
                ?>
            </nav>
        </div>

    </div>
</div>
<!-- Shop Product End -->
</div>
</div>
<!-- Shop End -->
