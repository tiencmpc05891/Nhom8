<?php

function getPaymentMethodText($paymentMethod)
{
    switch ($paymentMethod) {
        case 1:
            return 'Thanh toán khi nhận hàng';
        case 2:
            return 'Ngân hàng';
        case 3:
            return 'Momo';
        default:
            return 'Không xác định';
    }
}
?>
<?php

if (isset($_POST['pttt'])) {
    $selectedPaymentMethod = $_POST['pttt'];
} else {
    $selectedPaymentMethod = ''; // Đặt giá trị mặc định và xử lý nếu không có giá trị được chọn
}

?>
<style>
    .boxthank {
        text-align: center;
        margin-bottom: 20px;
    }

    .contentthank h2 {
        color: #333;
        margin-top: 0;
    }

    .boxtieude {
        background-color: #3D464D;
        color: #fff;
        padding: 10px;
        font-weight: bold;
        margin-top: 10px;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    h2 {
        color: #333;
    }
</style>


<div class="fullbox">
    <div class="fullcontent">

        <div class="boxthank">
            <div class="contentthank">
                <h2>Cảm ơn quý khách đã đặt hàng!</h2>
            </div>
            <?php
            if (isset($bill) && (is_array($bill))) {
                extract($bill);
            }

            ?>



            <div class="boxthontindh">
                <div class="boxcontentdh">Thông tin đơn hàng</div>
                <div class="thongtindh">
                    <li>Mã đơn hàng: ĐTHYU - <?= $bill['id']; ?></li>
                    <li>Ngày đặt hàng: <?= $bill['ngaydathang']; ?></li>
                    <li>Tổng đơn hàng: <?= number_format($bill['total'], 0, '.', '.'); ?></li>
                    <li>Phương thức thanh toán: <?= getPaymentMethodText($selectedPaymentMethod); ?></li>
                </div>
            </div>
        </div>


        <div class="boxthongtinkh">
            <div class="boxtieude">
                Thông tin đặt hàng
            </div>
            <div class="contentkh">
                <table>

                    <tr>
                        <td>Người đặt hàng</td>
                        <td><?= $bill['bill_name']; ?></td>

                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?= $bill['bill_address']; ?></td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $bill['bill_email']; ?></td>

                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><?= $bill['bill_tel']; ?></td>

                    </tr>

                </table>
            </div>
        </div>

        <div class="boxgiohang">
            <div class="boxtieude">Chi tiết giỏ hàng</div>
            <div>
                <table>

                    <?php bill_chi_tiet($billct); ?>
                </table>
            </div>
        </div>

        <br>
        <a href="index.php?act=shop"><input class="btn btn-success" type="button" value="Quay lại cửa hàng"></a>

    </div>

</div>