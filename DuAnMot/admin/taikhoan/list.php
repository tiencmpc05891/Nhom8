<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Khách hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="d-flex justify-content-end">
                <a href="index.php?act=bieudotaikhoan"> <button type="button" class="btn btn-primary mb-2">
                        Xem biểu đồ
                    </button></a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <?php
            if (isset($thongbao) && $thongbao != "") {
                // Hiển thị thông báo thành công với màu xanh
                echo '<div class="alert alert-success" role="alert">' . $thongbao . '</div>';
            }

            if (isset($loi) && $loi != "") {
                // Hiển thị thông báo lỗi với màu đỏ
                echo '<div class="alert alert-danger" role="alert">' . $loi . '</div>';
            }
            ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">MÃ TK</th>
                                        <th scope="col">TÊN ĐĂNG NHẬP</th>
                                        <th scope="col">MẬT KHẨU</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">ĐỊA CHỈ</th>
                                        <th scope="col">ĐIỆN THOẠI</th>
                                        <th scope="col">VAI TRÒ</th>
                                        <th scope="col">THAO TÁC</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($listtaikhoan as $taikhoan) {
                                    extract($taikhoan);
                                    $suatk = "index.php?act=suatk&id=" . $id;
                                    $xoatk = "index.php?act=xoatk&id=" . $id;

                                    echo ' <tr>
                <td>' . $id . '</td>
                <td>' . $user . '</td>
                <td>' . $pass . '</td>
                <td>' . $email . '</td>
                <td>' . $address . '</td>
                <td>' . $tel . '</td>
                <td>' . ($role == 1 ? 'Admin' : 'User') . '</td>
                <td>
                    <a href="' . $suatk . '"><input class="btn btn-warning" type="button" value="Sửa"></a>
                    <a href="#" onclick="confirmDelete(\'' . $xoatk . '\')"><input class="btn btn-danger" type="button" value="Xóa"></a>
                </td>
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
<script>
    function confirmDelete(url) {
        var r = confirm("Bạn có chắc chắn muốn xóa?");
        if (r == true) {
            window.location.href = url; // Redirect to the delete URL if the user clicks "OK"
        } else {
            alert("Xóa đã bị hủy bỏ.");
        }
    }
</script>
<!-- /.content-wrapper -->