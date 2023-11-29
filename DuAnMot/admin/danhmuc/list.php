
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
            // Send an asynchronous request to delete the item
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);

            xhr.onload = function () {
                if (xhr.status == 200) {
                    // Successful deletion
                    alert("Xóa thất bại!");
                    window.location.reload(); // You can also redirect or update the page as needed
                } else {
                    // Failed deletion
                    alert("Xóa thành công.");
                    window.location.reload(); 
                }
            };

            xhr.send();
        } else {
            alert("Xóa đã bị hủy bỏ.");
        }
    }
</script>

<!-- /.content-wrapper -->