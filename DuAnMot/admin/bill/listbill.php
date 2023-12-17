<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <a href="index.php?act=bieudobill"> <button type="button" class="btn btn-primary mb-2">
                        Xem biểu đồ
                    </button></a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Khách hàng</th>
                                        <th scope="col">Số lượng hàng</th>
                                        <th scope="col">Ngày đặt hàng</th>
                                        <th scope="col">Tình trạng đơn hàng</th>
                                        <th scope="col">Duyệt đơn</th>
                                        <th scope="col">Xóa đơn</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($listbill as $bill) {
                                    extract($bill);
                                    $xoadh = "index.php?act=xoadh&id=" . $id;
                                    $kh = $bill["bill_name"] . '<br>' . $bill["bill_email"] . '<br>' . $bill["bill_address"] . '<br>' . $bill["bill_tel"];
                                    $ttdh = get_ttdh($bill["bill_status"]);
                                    $countsp = loadall_cart_count($bill["id"]);
                                ?>
                                    <tr>
                                        <td>CMT<?php echo $bill['id']; ?></td>
                                        <td><?php echo $kh; ?></td>
                                        <td><?php echo $countsp; ?></td>
                                        <td><?php echo $ngaydathang; ?></td>
                                        <td><strong><?php echo $bill["total"]; ?></strong>VNĐ</td>
                                        <td><?php echo $ttdh; ?></td>
                                        <td>
                                            <form action="index.php?act=duyet_donhang" method="post">
                                                <input type="hidden" name="id" value="<?php echo $bill['id']; ?>">
                                                <button type="submit" class="btn btn-success">Duyệt đơn hàng</button>
                                            </form>
                                        </td>

                                        <td>
                                            <button class="btn btn-danger" type="button" onclick="confirmDeleteOrder(<?php echo $bill['id']; ?>)">Xóa</button>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function confirmDeleteOrder(orderId) {
        // Hiển thị hộp thoại xác nhận
        var result = confirm("Bạn có chắc chắn muốn xóa đơn hàng không?");

        // Nếu người adminchọn "OK" (đồng ý), chuyển hướng đến trang xử lý xóa đơn hàng
        if (result) {
            window.location.href = "index.php?act=xoadh&id=" + orderId;
        }
        // Nếu người adminchọn "Cancel" (không đồng ý), không làm gì cả
    }
</script>