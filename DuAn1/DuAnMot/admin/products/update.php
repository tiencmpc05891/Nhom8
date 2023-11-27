<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80' >";
} else {
    $hinh = "không có hình";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Sản Phẩm</h1>
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

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                                            <select class="form-control select2" name="iddm">

                                                <option value="0" selected>Tất cả</option>
                                                <?php
                                                foreach ($listdanhmuc as $danhmuc) {

                                                    if ($iddm == $danhmuc['id'])
                                                        $s = "selected";
                                                    else
                                                        $s = "";

                                                    echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="level" class="col-form-label">Tên sản phẩm:</label>

                                        <input type="text" class="form-control" name="tensp" value="<?= $name ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="level" class="col-form-label">Giá sản phẩm:</label>
                                        <input type="text" class="form-control" name="giasp" value="<?= $price ?>">
                                    </div>

                                    <div class="mb-3">

                                        <label for="level" class="col-form-label">Hình ảnh: </label>
                                        <?= $hinh ?>
                                        <input type="file" name="hinh">

                                    </div>

                                    <div class="mb-3">
                                        <label for="level" class="col-form-label">Mô tả:</label>
                                        <textarea name="mota" id="" cols="30" rows="5"
                                            style="width:100%; border:1px #CCC solid"
                                            class="col-form-label"><?= $mota ?></textarea>
                                    </div>


                                </div>
                                <div class="modal-footer justify-content-between">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <a href="index.php?act=listsp"> <input type="button" class="btn btn-primary"
                                            value="Danh sách"></input></a>

                                    <input type="submit" class="btn btn-success" name="capnhat"
                                        value="Cập nhật"></input></a>

                                </div>
                                <?php
                                if (isset($thongbao) && ($thongbao != ""))
                                    echo $thongbao;


                                ?>
                            </form>
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


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?act=addsp" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                        <input type="file" name="img" class="col-form-label" id="">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Mô tả</label>
                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid"
                            class="col-form-label"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                            <select class="form-control select2" name="level">
                                <option selected value="member">Danh mục</option>
                                <option value="admin">Danh mục 1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="index.php?act=listsp"> <input type="button" class="btn btn-primary"
                            value="Danh sách"></input></a>

                    <input type="submit" name="themmoi" class="btn btn-success" value="Thêm mới"></input></a>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
