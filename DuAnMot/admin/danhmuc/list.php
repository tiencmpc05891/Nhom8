
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <a href="index.php?act=adddm"><button type="button" class="btn btn-primary mb-2">
                        Thêm danh mục
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
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    $suadm = "index.php?act=suadm&id=" . $id;
                                    $xoadm = "index.php?act=xoadm&id=" . $id;

                                    echo '                        
                                <tr>
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>
                                        <a href="' . $suadm . '"><input class="btn btn-warning" type="button" value="Sửa"></a> 
                                        <a href="#" onclick="confirmDelete(\'' . $xoadm . '\')"><input class="btn btn-danger" type="button" value="Xóa"></a>
                                    </td>
                                </tr>';
                                }
                                ?>
                                <!-- <tfoot>

                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên chủ đề</th>
                                        <th scope="col">Chế độ</th>
                                        <th scope="col">Số lượng câu hỏi</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </tfoot> -->
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
            window.location.href = url; // Chuyển hướng đến URL xóa nếu người dùng chọn "OK"
        } else {
            alert("Xóa đã bị hủy bỏ.");
        }
    }
</script>

<!-- /.content-wrapper -->