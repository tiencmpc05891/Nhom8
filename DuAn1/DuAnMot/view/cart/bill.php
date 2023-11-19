<style>
    /* CSS cho bảng giỏ hàng */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2;
    }

    /* CSS cho nút Xóa trong giỏ hàng */
    input[type="button"] {
        background-color: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Hiệu ứng hover */
    }

    input[type="button"]:hover {
        background-color: #cc0000;
        /* Màu nền thay đổi khi hover */
    }

    /* CSS cho nút Đồng ý đặt hàng và Xóa tất cả giỏ hàng */
    .bill input[type="submit"],
    .bill a input[type="button"] {
        background-color: #635b5b;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Hiệu ứng hover */
    }

    .bill input[type="submit"]:hover,
    .bill a input[type="button"]:hover {
        background-color: red;
        /* Màu nền thay đổi khi hover */
    }

    .tenthongtindathang {
        color: red;
        font-family: Arial;
        text-align: center;
        font-size: 40px;
        margin-bottom: 10px;

    }
</style>

<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billcomform" method="post">

            <div class="row mb">
                <div class="tenthongtindathang">
                    Thông tin đặt hàng
                </div>
                <div class="row boxcontent billform">
                    <table>
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


                        <tr>
                            <td>Người đặt hàng</td>
                            <td><input type="text" name="name" value="<?= $user ?>"></td>

                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" value="<?= $address ?>"></td>

                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>"></td>

                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>"></td>

                        </tr>

                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtieude">Phương thức thanh toán</div>
                <div class="row boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" name="pttt" value="1" checked>Thanh toán khi nhận hàng</td>
                            <td><input type="radio" name="pttt" value="2">Thẻ ghi nợ/thẻ tín dụng</td>
                            <td><input type="radio" name="pttt" value="3">Ví điện tử MoMo</td>
                        </tr>



                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtieude">Thông tin giỏ hàng</div>
                <div class="row boxcontent cart">
                    <table>

                        <?php viewcart(0); ?>
                    </table>
                </div>


            </div>
            <div class="row mb bill">
                <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
            </div>
        </form>
    </div>

</div>