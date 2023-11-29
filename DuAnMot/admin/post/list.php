<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Bài viết</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <a href="index.php?act=addbv"> <button type="button" class="btn btn-primary mb-2">
                        Thêm bài viết mới
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
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ảnh</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($listbaiviet as $baiviet) {
                                    extract($baiviet);
                                    $suabv = "index.php?act=suabv&id=" . $id;
                                    $xoabv = "index.php?act=xoabv&id=" . $id;
                                    $hinhpath = "../upload/" . $img;
                                    if (is_file($hinhpath)) {
                                        $hinh = "<img src='" . $hinhpath . "' height='80' >";
                                    } else {
                                        $hinh = "không có hình";
                                    }
                                    echo '<tr>
                <td>' . $id . '</td>
                <td>' . $tieude . '</td>
                <td>' . $noidung . '</td>
                <td>' . $hinh . '</td>
                <td>
                    <a href="' . $suabv . '"><input class="btn btn-warning" type="button"  value="Sửa"></a>
                    <a href="#" onclick="confirmDelete(\'' . $xoabv . '\')"><input type="button" class="btn btn-danger" value="Xóa"></a>
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
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm bài viết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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