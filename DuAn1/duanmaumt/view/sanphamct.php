
<?php

if (isset($titlepage) && $titlepage != "") {
    $title = $titlepage;
} else {
    $title = "Sản Phẩm";
}

// Lấy danh mục sản phẩm và sản phẩm cụ thể dựa trên tham số từ URL (nếu có)
$iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 1;
$dssp = loadall_sanpham("", $iddm);
$html_dm = showdm($dsdm);


?>


<div>
    <img style="text-align: center; width: 100%; height: 250px" src="../view/img/headergalaxy.jpg" alt="">
</div>
<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DANH MỤC</h1><br><br>
            <?= $html_dm ?>
        </div>
        <div class="boxright">
            <h1>SẢN PHẨM CHI TIỂT</h1><br>
            <div class="containerfull mr30">
                <div class="col6 imgchitiet">
                    <!-- <img src="view/img/<?= $img ?>" alt=""> -->

                    <?php
                    
                    extract($onesp);
                    $img = $img_path . $img;
                    echo '<img src="' . $img . '" > <br>';
                    echo $mota;
                    
                    ?>
                  
                    
                </div>
                <div class="col6 textchitiet">
                    <h2><?= $name ?></h2>
                    <p style="text-align:left; font-size:xx-large;"></p><?= number_format($price) ?> đ</p>

                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="img" value="<?= $img ?>">
                        <input type="hidden" name="name" value="<?= $name ?>">
                        <input type="hidden" name="price" value="<?= $price ?>">
                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                    </form>

                </div>



            </div>
            
            <hr>
            <iframe src="../view/binhluanform.php" width="100%" height="200px" frameborder="0">


            </iframe>
            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="containerfull mr30">
                <?php
                // foreach ($sp_cung_loai as $sp_cung_loai) {
                //     extract($sp_cung_loai);
                //     $img = $img_path . $img;
                //     $linksp = "index.php?act=sanphamct&idsp=" . $id;
                //     echo '<form action="index.php?act=addtocart" method="post">';
                //     echo '<div  class="box25 mr15">';
                //     echo '<img src="' . $img . '"  >';
                //     echo '<li style="list-style-type: none;"><a" href="' . $linksp . '">' . $name . '</a></li>';
                //     echo '<p><strong style="color:red;">' . number_format($price) . '<sup>đ</sup></strong></p>';
                //     echo '<input type="submit" name="addtocart" value="Thêm vào giỏ hàng">';
                //     echo '</div>';
                //     echo '</form>';
                // }
                ?>

                <?php
                foreach ($sp_cung_loai as $sp_cung_loai) {
                    extract($sp_cung_loai);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $img = $img_path . $img;
                ?>
                    <div class="box25 mr15">
                        <div class="row img">
                            <a href="<?= $linksp ?>">
                                <img src="<?= $img ?>" alt="<?= $name ?>">
                            </a>
                        </div>
                        <p><strong style="color:red;"><?= number_format($price) ?><sup>đ</sup></strong></p>
                        <a href="<?= $linksp ?>"><?= $name ?></a>
                        <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="idmm" value="<?= $idmm ?>">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="img" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <br>
                            <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                            <br><br>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


    </div>
</section>