<style>
    .box25 {
        text-align: center;
        /* Canh giữa nội dung */

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
$dssp = loadall_sanpham("", $iddm);


?>
<div><img style="text-align: center; width:100%; height:250px" src="../view/img/headergalaxy.jpg" alt=""></div>

<div class="containerfull">


    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DANH MỤC</h1><br><br>
                <?= $html_dm; ?>
            </div>
            <div class="boxright">
                <h1><?= $title ?></h1><br>
                <div class="containerfull mr30">
                    <!-- <?php
                            foreach ($dssp as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=sanphamct&idsp=" . $sp['id'];
                                $img = $img_path . $img;
                                echo '<div  class="box25 mr15">';
                                echo '<form action="index.php?act=addtocart" method="post">';

                                echo '<a href="' . $linksp . '">';
                                echo '<img src="' . $img . '" alt="' . $name . '">';
                                echo '</a>';
                                echo '<p><strong style="color:red;">' . number_format($price) . '<sup>đ</sup></strong></p>';
                                echo '<a href="' . $linksp . '">' . $name . '</a> <br>';
                                echo '<input type="submit" name="addtocart" value="Mua ngay">';

                                echo ' </form>';
                                echo '</div>';
                            }
                            ?> -->



                    <?php
                    foreach ($dssp as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $sp['id'];
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
</div>