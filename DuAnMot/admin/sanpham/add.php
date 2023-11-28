<!-- <div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục <br>
                <select name="iddm">
                <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <input type="text" name="masp" disabled>

            </div>
            <div class="row mb10">
                Tên sản phẩm <br>
                <input type="text" name="tensp">
            </div>
            <div class="row mb10">
                Giá <br>
                <input type="text" name="giasp">
            </div>
            <div class="row mb10">
                Ảnh <br>
                <input type="file" name="hinh">
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="mota" cols="30" rows="10"></textarea>

            </div>
            <div class="row mb10">

                <input type="submit" name="themmoi" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>

            </div>
           
        </form>
    </div>
</div>
</div> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Mới Sản Phẩm</h1>
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
                            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                                            <select class="form-control select2" name="iddm">
                                                <?php
                                                foreach ($listdanhmuc as $danhmuc) {
                                                    extract($danhmuc);
                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="tensp" placeholder="Tên sản phẩm">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="giasp" placeholder="Giá sản phẩm">
                                    </div>
                                 
                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                                        <input type="file" name="hinh" class="col-form-label">
                                    </div>

                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Mô tả</label>
                                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Thông tin</label>
                                        <textarea name="thongtin" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a href="index.php?act=listsp"> <input type="button" class="btn btn-primary" value="Danh sách"></input></a>

                                    <input type="submit" name="themmoi" class="btn btn-success" value="Thêm mới"></input></a>

                                </div>
                               
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
                <h4 class="modal-title">Thêm sản phẩm</h4>
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
                        <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Cấu hình</label>
                        <textarea name="thongtin" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>
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
                    <a href="index.php?act=listsp"> <input type="button" class="btn btn-primary" value="Danh sách"></input></a>

                    <input type="submit" name="themmoi" class="btn btn-success" value="Thêm mới"></input></a>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>