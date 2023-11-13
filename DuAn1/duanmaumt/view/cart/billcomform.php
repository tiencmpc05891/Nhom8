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
</style>
<div class="row">
    <div class="boxtrai mr">

        <div class="row mb">
            <div class="boxtieude"> Cảm ơn</div>


            <div class="row boxcontent" style="text-align:center">
                <h2>Cảm ơn quý khách đã đặt hàng!</h2>
            </div>
        </div>
        <?php
        if (isset($bill) && (is_array($bill))) {
            extract($bill);
        }

        ?>
        <div class="row mb">
            <div class="boxtieude">Thông tin đơn hàng</div>
            <div class="row boxcontent" style="text-align:center">
                <li>Mã đơn hàng: CMT-<?= $bill['id']; ?></li>
                <li>Ngày đặt hàng: <?= $bill['ngaydathang']; ?></li>
                <li>Tổng đơn hàng: <?= $bill['total']; ?></li>
                <li>Phương thức thanh toán: <?= $bill['bill_pttt']; ?></li>
            </div>
        </div>


        <div class="row mb">
            <div class="boxtieude">
                Thông tin đặt hàng
            </div>
            <div class="row boxcontent billform">
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

        <div class="row mb">
            <div class="boxtieude">Chi tiết giỏ hàng</div>
            <div class="row boxcontent cart">
                <table>

                    <?php bill_chi_tiet($billct); ?>
                </table>
            </div>
        </div>



    </div>

</div>