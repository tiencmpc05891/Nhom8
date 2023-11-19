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

                                    echo '                        <tr>

                            <td>' . $id . '</td>
                            <td>' . $user . '</td>
                            <td>' . $pass . '</td>
                            <td>' . $email . '</td>
                            <td>' . $address . '</td>
                            <td>' . $tel . '</td>
                            <td>' . ($role == 1 ? 'Admin' : 'User') . '</td>
                            
                            <td><a href="' . $suatk . '"><input  class="btn btn-warning" type="button" value="Sửa"></a> <a href="' . $xoatk . '"><input class="btn btn-danger"  type="button" value="Xóa"></a></td>
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