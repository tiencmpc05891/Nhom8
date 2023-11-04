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

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                 
                         
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Khách hàng</th>
                                        <th scope="col">Số lượng hàng</th>
                                        <th scope="col">Tình trạng đơn hàng</th>
                                        <th scope="col">Ngày đặt hàng</th>
                                        <th scope="col">Thao tác</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($listbill as $bill) {
                                    extract($bill);
                                    $suadh = "index.php?act=suadh&id=" . $id;
                                    $xoadh = "index.php?act=xoadh&id=" . $id;
                                    $kh = $bill["bill_name"] . '
                                    <br>' . $bill["bill_email"] . '
                                    <br>' . $bill["bill_address"] . '
                                    <br>' . $bill["bill_tel"];
                                    $ttdh = get_ttdh($bill["bill_status"]);
                                    $countsp = loadall_cart_count($bill["id"]);

                                    echo '  <tr>
                                 
                                    <td>CMT' . $bill['id'] . '</td>
                                    <td>' . $kh . '</td>
                                    <td>' . $countsp . '</td>
                                    <td><strong>' . $bill["total"] . '</strong>VNĐ</td>
                                    <td>' . $ttdh . '</td>
                                    <td>' . $bill["ngaydathang"] . '</td>
                                    <td><a href="' . $suadh . '"><input  class="btn btn-warning" type="button" value="Sửa"></a> <a href="' . $xoadh . '"><input class="btn btn-danger"  type="button" value="Xóa"></a></td>

                                    </tr>';
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