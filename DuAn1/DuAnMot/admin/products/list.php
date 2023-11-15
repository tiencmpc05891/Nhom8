<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
            <a href="index.php?act=addsp"> <button type="button" class="btn btn-primary mb-2">
                    Thêm sản phẩm mới
                </button></a>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Hình</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Lượt xem</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tên sản phẩm 1</td>
                                        <td><img src="../view/img/xiaomi-12t-pro-thumb-den-1-600x600.jpg" height="80" alt="Hình sản phẩm 1"></td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>
                                            <a href="index.php?act=updatesp"><button class="btn btn-warning" type="button">Sửa</button></a>
                                            <a href="index.php?act=xoasp&id=1"><button class="btn btn-danger" type="button">Xóa</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tên sản phẩm 2</td>
                                        <td><img src="../view/img/iphone-11-den-600x600.jpg" height="80" alt="Hình sản phẩm 2"></td>
                                        <td>150</td>
                                        <td>70</td>
                                        <td>
                                            <a href="index.php?act=suasp&id=2"><button class="btn btn-warning" type="button">Sửa</button></a>
                                            <a href="index.php?act=xoasp&id=2"><button class="btn btn-danger" type="button">Xóa</button></a>
                                        </td>
                                    </tr>
                                    <!-- Thêm các dòng khác tương tự -->
                                </tbody>
                                <!-- <?php
                                foreach ($listsanpham as $sanpham) {
                                    extract($sanpham);
                                    $suasp = "index.php?act=suasp&id=" . $id;
                                    $xoasp = "index.php?act=xoasp&id=" . $id;
                                    $hinhpath = "../upload/" . $img;
                                    if (is_file($hinhpath)) {
                                        $hinh = "<img src='" . $hinhpath . "' height='80' >";
                                    } else {
                                        $hinh = "không có hình";
                                    }
                                    echo '                        <tr>s
                          
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $hinh . '</td>
                                    <td>' . $price . '</td>
                                    <td>' . $luotxem . '</td>
                                    <td><a href="' . $suasp . '"><input class="btn btn-warning" type="button"  value="Sửa"></a> <a href="' . $xoasp . '"><input type="button" class="btn btn-danger" value="Xóa"></a></td>
                                    </tr>';
                                }
                                ?> -->

                        
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         
          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>