<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../view/img/slide3.png" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../view/img/slide1.png" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../view/img/slide2.png" style="width:100%">
                        <div class="text"></div>
                    </div>

                    <!-- Next and previous buttons -->
                    <a style="margin-left:-333px;" class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">

                </div>
            </div>
        </div>

    </div>

</div>


<?php
$html_dssp_viewall = dsspall($spnew);
$html_dssp_yeuthich = showdsyt($dstopsp);
?>

<divclass="containerfull">
    <section class="containerfull">
        <div class="container">
            <div class="containerfull mr30">
                <h1>TỔNG HỢP SẢN PHẨM</h1><br>

                <?= $html_dssp_viewall ?>
            </div>
            <div class="containerfull mr30">
                <h1>TOP SẢN PHẨM YÊU THÍCH</h1><br>
                <form action="index.php?act=addtocart" method="post">
                    <?= $html_dssp_yeuthich ?>
                </form>
            </div>
        </div>
    </section>
    </div>